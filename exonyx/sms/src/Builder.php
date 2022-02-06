<?php

namespace Exonyx\Sms;

use Illuminate\Support\Arr;

class Builder
{
    protected array $recipients = [];

    protected string $body;

    protected ?string $driver = null;

    protected string $template;

    public function to($recipients): self
    {
        $this->recipients = Arr::wrap($recipients);

        return $this;
    }

    public function getBody(): string
    {
        return $this->body;
    }

    public function getTemplate(): string
    {
        if(isset($this->template))
        {
            return $this->template;
        }
        return false;

    }

    public function send($body): self
    {
        $this->body = $body;

        return $this;
    }

    public function template($template): self
    {
        $this->template = $template;

        return $this;
    }

    public function via($driver): self
    {
        $this->driver = $driver;

        return $this;
    }

    public function getRecipients(): array
    {
        return $this->recipients;
    }

    public function getDriver(): ?string
    {
        return $this->driver;
    }
}
