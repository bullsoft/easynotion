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

### Database Filter
```php
use EasyNotion\Property\Filter;

$dbClient = $notion->database();
$dbId = 'your-db-id';
$db = $dbClient->get($dbId);

$propConfig = $db->properties; // $db is a db-entity from remote

$filter1 = Filter::make("Age", $propConfig['Age']->getType()); // type Number
$filter1->greaterThan(30);

$filter2 = Filter::make("Name", $propConfig['Name']->getType()); // type Title
$filter2->contains('Gu');

$filter1->and($filter2); // Compound

echo json_encode($filter1) . PHP_EOL;

$query = $dbClient->query($dbId, filter: $filter1);

var_export($query->result());
```

### Database Sorts
```php
use EasyNotion\Property\Sort;

$sort = new Sort();
$sort->by("created_time", Direction::Asc);
$sort->by('Name', Direction::Desc);
echo json_encode($sort) . PHP_EOL;

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

$blockId = 'your-block-id'; // page is a special block

$block = $blockClient->get($blockId);
var_dump($block); // block entity

$children = $blockClient->children($blockId, 5); // collection
var_dump($children);
var_dump($children->next()); // collection for next page

```

## Property

```php
$pageClient = $notion->page();

$pageId = 'your-page-id';
$page = $pageClient->get($pageId);
var_dump($page);

$propertyClient = $notion->property($page);
$property = $propertyClient->get('your-property-id'); // PropertyId from $page->properties
var_dump($property);

```