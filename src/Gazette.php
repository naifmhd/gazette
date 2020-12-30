<?php

namespace Naifmhd\Gazette;

use Http;
use Cache;
use Illuminate\Support\Arr;
use Naifmhd\Gazette\Exceptions\GazetteTokenInvalidException;

class Gazette
{

    const GAZETTE_URL = 'https://api.gazette.gov.mv/';

    private function getToken()
    {
        if (Cache::has('GAZETTE_TOKEN')) {
            $access_token = Cache::get('GAZETTE_TOKEN');
            return $access_token;
        } else {
            $response = Http::post(self::GAZETTE_URL . "oauth/token", config('services.gazette'));
            if ($response->ok()) {
                $data = $response->json();
                $seconds = Arr::get($data, 'expires_in');
                $access_token = Arr::get($data, 'access_token');
                Cache::put('GAZETTE_TOKEN', $access_token, $seconds);
                return $access_token;
            } else {
                throw new GazetteTokenInvalidException();
            }
        }
    }

    public function iulaans(int $page = null)
    {
        if (is_null($page)) {
            $response = Http::withToken(self::getToken())->get(self::GAZETTE_URL . "iulaan");
            if ($response->ok()) {
                return $response->json();
            } else {
                throw new GazetteRequestFailedException();
            }
        } else {
            $response = Http::withToken(self::getToken())->get(self::GAZETTE_URL . "iulaan/page/{$page}");
            if ($response->ok()) {
                return $response->json();
            } else {
                throw new GazetteRequestFailedException();
            }
        }
        // return "test";
    }

    public function iulaan(int $id)
    {
        if (is_null($id)) {
            throw new GazetteRequestFailedException('A valid iulaan id is required.');
        } else {
            $response = Http::withToken(self::getToken())->get(self::GAZETTE_URL . "iulaan/{$id}");
            if ($response->ok()) {
                return $response->json();
            } else {
                throw new GazetteRequestFailedException();
            }
        }
    }

    public function iulaanByType(string $iulaanType, int $page = null)
    {
        if (is_null($page)) {
            $response = Http::withToken(self::getToken())->get(self::GAZETTE_URL . "iulaan/type/{$iulaanType}");
            if ($response->ok()) {
                return $response->json();
            } else {
                throw new GazetteRequestFailedException();
            }
        } else {
            $response = Http::withToken(self::getToken())->get(self::GAZETTE_URL . "iulaan/type/{$iulaanType}/page/{$page}");
            if ($response->ok()) {
                return $response->json();
            } else {
                throw new GazetteRequestFailedException();
            }
        }
    }

    public function vazeefaByType(string $vazeefaType, int $page = null)
    {
        if (is_null($page)) {
            $response = Http::withToken(self::getToken())->get(self::GAZETTE_URL . "iulaan/type/vazeefaa/category/{$vazeefaType}");
            if ($response->ok()) {
                return $response->json();
            } else {
                throw new GazetteRequestFailedException();
            }
        } else {
            $response = Http::withToken(self::getToken())->get(self::GAZETTE_URL . "iulaan/type/vazeefaa/category/{$vazeefaType}/page/{$page}");
            if ($response->ok()) {
                return $response->json();
            } else {
                throw new GazetteRequestFailedException();
            }
        }
    }

    public function unpublished()
    {
        $response = Http::withToken(self::getToken())->get(self::GAZETTE_URL . "iulaan/unpublished");
        if ($response->ok()) {
            return $response->json();
        } else {
            throw new GazetteRequestFailedException();
        }
    }
}
