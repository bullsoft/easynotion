# easynotion
Notion SDK for PHP

```php
use EasyNotion\EasyNotion;

require __DIR__ . '/vendor/autoload.php';

$token = getenv("NOTION_TOKEN");
$notion = new EasyNotion($token);
```

## Database

```php
$dbClient = $notion->database();

$dbId = 'your-db-id';
$db = $dbClient->get($dbId);
var_dump($db); // db entity

// db content
$query = $dbClient->query($dbId, 1);
var_dump($query->result());

while($query->hasMore()) {
    sleep(2);
    $query = $query->next();
    var_dump($query->result());
} 
```

## Page

```php
$pageClient = $notion->page();

$pageId = 'your-page-id';
$page = $pageClient->get($pageId);

var_dump($page);
```

## Block

```php
$blockClient = $notion->block();

$blockId = 'a43f308305d949a697376d74d31ea106'; // page is a special block

$block = $blockClient->get($blockId);
var_dump($block); // block entity

$children = $blockClient->children($blockId, 5); // collection
var_dump($children);
var_dump($children->next()); // collection for next page

```

## property

```php
$pageClient = $notion->page();

$pageId = 'your-page-id';
$page = $pageClient->get($pageId);
var_dump($page);

$propertyClient = $notion->property($page);
$property = $propertyClient->get('HV%3F~'); // "HV%3F~" is a propertyId from $page->properties
var_dump($property);

```