<?php
use EasyNotion\Http\Database as DbClient;
use EasyNotion\Entity\Database as DbEntity;
use EasyNotion\Common\UUIDv4;


beforeEach(function() {
    $this->dbId = '3791ea11e83a4f979a744f043fefdf37';
    $this->client = $this->notion->database();
});

test('database client instanceof EasyNotion\Http\Database', function () {
    expect($this->client)->toBeInstanceOf(DbClient::class);
});

test('database entity instanceof EasyNotion\Entity\Database', function() {
    $db = $this->client->get($this->dbId);
    expect($db)->toBeInstanceOf(DbEntity::class);
});

test('database id instanof UUIDv4', function() {
    $db = $this->client->get($this->dbId);
    expect($db->id())->toBeInstanceOf(UUIDv4::class);
    expect($db->id()->get())->toBe(UUIDv4::format($this->dbId));
});

