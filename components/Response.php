<?php

namespace app\components;

use yii\web\Response as BaseResponse;

/**
 * Class Response
 * @package app\response
 */
class Response extends BaseResponse
{
    const FORMAT_META_JSON = 'meta_json';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        // trigger
        $this->on(self::EVENT_BEFORE_SEND, function ($event) {

            /** @var BaseResponse $response */
            $response = $event->sender;

            if ($response->format === self::FORMAT_META_JSON) {

                if ($response->data !== null) {

                    // has error
                    if (isset($response->data['errors'])) {

                        $response->setStatusCode(isset($response->data['status']) ? $response->data['status'] : 400);
                        $response->data = [
                            'success' => false,
                            'errors' => self::parseErrors($response->data['errors'])
                        ];
                    } elseif ($response->isSuccessful === false) {

                        $response->data = [
                            'success' => $response->isSuccessful,
                            'errors' => $response->data
                        ];

                    } else {

                        $response->data = [
                            'success' => $response->isSuccessful,
                            'data' => $response->data
                        ];
                    }
                }
//                dx(123);
                $response->format = self::FORMAT_JSON;
            }
        });
    }

    /**
     * @param $errors
     * @return array
     */
    public static function parseErrors($errors)
    {
        if (is_array($errors)) {

            $result = [];
            foreach (array_keys($errors) as $key) {
                $result[] = [
                    'name' => $key,
                    'message' => is_array($errors[$key]) ? implode(',', $errors[$key]) : $errors[$key],
                ];
            }

            return $result;

        }


        return [
            'name' => 'unknown',
            'message' => $errors,
            'status' => 200
        ];
    }
}
