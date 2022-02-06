<?php
namespace Exonyx\Sms\Drivers;

use Illuminate\Http\Request;
use Kavenegar\KavenegarApi;
use Exonyx\Sms\Contracts\Driver;

class Kavenegarotp extends Driver
{
    protected array $settings;

    protected KavenegarApi $client;

    protected $templatekey;

    public function __construct(array $settings)
    {
        $this->settings     = $settings;
        $this->client       = new KavenegarApi(data_get($this->settings, 'apiKey'));
        if(isset($this->template))
        {
            $this->templatekey  = $this->template;
        }else
        {
            $this->templatekey  = data_get($this->settings, 'templateKey');
        }
    }

    public function send()
    {
        $response = collect();
        foreach ($this->recipients as $recipient) {
            $response->put(
                $recipient,
                $this->client->VerifyLookup($recipient, $this->body,null,null,$this->templatekey)
            );
        }
        return (count($this->recipients) == 1) ? $response->first() : $response;
    }
}
