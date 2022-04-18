<?php
use EasyNotion\Http\Database as DbClient;
use EasyNotion\Entity\Database as DbEntity;
use EasyNotion\Common\UUIDv4;

beforeEach(fn () => $this->client = $this->notion->database());

test('database client instanceof EasyNotion\Http\Database', function () {
    expect($this->client)->toBeInstanceOf(DbClient::class);
});

test('database entity instanceof EasyNotion\Entity\Database', function() {
    $dbId = '3791ea11e83a4f979a744f043fefdf37';
    $db = $this->client->get($dbId);
    expect($db)->toBeInstanceOf(DbEntity::class);
});

test('database id instanof UUIDv4', function() {
    $dbId = '3791ea11e83a4f979a744f043fefdf37';
    $db = $this->client->get($dbId);
    expect($db->id())->toBeInstanceOf(UUIDv4::class);
    expect($db->id()->get())->toBe(UUIDv4::format($dbId));
});

