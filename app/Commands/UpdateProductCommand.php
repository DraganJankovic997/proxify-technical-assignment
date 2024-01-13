<?php

namespace App\Commands;

class UpdateProductCommand{

    public string $uuid;
    public ?string $title;
    public ?string $description;
    public ?float $price;
    public ?string $image;

    public function __construct(string $uuid, ?string $title, ?string $description, ?float $price, ?string $image) {
        $this->uuid = $uuid;
        $this->title = $title;
        $this->description = $description;
        $this->price = $price;
        $this->image = $image;
    }

}
