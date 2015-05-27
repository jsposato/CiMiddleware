<?php
namespace App;

use JenkinsKhan\Jenkins;

class MobJenkins extends Jenkins
{

    private $baseUrl;

    /**
     * @param string $baseUrl
     */
    public function __construct($baseUrl)
    {
        $this->baseUrl = $baseUrl;
    }

    public function getView($viewName)
    {
        $url = sprintf('%s/view/%s/api/json', $this->baseUrl, rawurlencode($viewName));

        $curl = $this->setupCurl($url);
        $ret  = curl_exec($curl);

        if (curl_errno($curl)) {
            throw new \RuntimeException(
                sprintf('Error during getting information for view %s on %s: %s', $viewName, $this->baseUrl,
                    curl_error($curl))
            );
        }
        $infos = json_decode($ret);
        if (!$infos instanceof \stdClass) {
            throw new \RuntimeException('Error during json_decode');
        }

        unset($curl);

        return new Jenkins\View($infos, $this);
    }

    public function isAvailable()
    {
        $curl = $this->setupCurl($this->baseUrl . '/api/json');
        curl_exec($curl);

        if (curl_errno($curl)) {
            return false;
        } else {
            try {
                $this->getQueue();
            } catch (RuntimeException $e) {
                //en cours de lancement de jenkins, on devrait passer par là
                return false;
            }
        }

        return true;
    }

    public function getQueue()
    {
        $url  = sprintf('%s/queue/api/json', $this->baseUrl);
        $curl = $this->setupCurl($url);

        $ret = curl_exec($curl);

        if (curl_errno($curl)) {
            throw new \RuntimeException(sprintf('Error during getting information for queue on %s: %s', $this->baseUrl),
                curl_error($curl));
        }
        $infos = json_decode($ret);
        if (!$infos instanceof \stdClass) {
            throw new \RuntimeException('Error during json_decode');
        }

        return new Jenkins\Queue($infos, $this);
    }

    public function getJob($jobName)
    {
        $url  = sprintf('%s/job/%s/api/json', $this->baseUrl, $jobName);
        $curl = $this->setupCurl($url);

        $ret = curl_exec($curl);

        $response_info = curl_getinfo($curl);

        if (200 != $response_info['http_code']) {
            return false;
        }

        if (curl_errno($curl)) {
            throw new \RuntimeException(
                sprintf('Error during getting information for job %s on %s', $jobName, $this->baseUrl)
            );
        }
        $infos = json_decode($ret);
        if (!$infos instanceof \stdClass) {
            throw new \RuntimeException('Error during json_decode');
        }

        return new Jenkins\Job($infos, $this);
    }

    private function setupCurl($url)
    {
        $curl = curl_init($url);
        curl_setopt($curl, \CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, \CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, \CURLOPT_SSL_VERIFYPEER, false);

        return $curl;
    }
}