# easynotion
Notion SDK for PHP

## sample codes
```php
use EasyNotion\EasyNotion;

require __DIR__ . '/vendor/autoload.php';

$token = getenv("NOTION_TOKEN");
$notion = new EasyNotion($token);
$db = $notion->database('{your_data_base_id}');
var_dump($db->get());
```