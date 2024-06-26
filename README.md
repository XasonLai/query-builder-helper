# QueryBuilderHelper

QueryBuilderHelper is a PHP package designed to work with Laravel's Eloquent query builder. It provides a convenient way to get the raw SQL query along with its bindings, which can be useful for debugging and logging.

## Installation

You can install the package via composer:

```bash
composer require guagualai/query-builder-helper
```

## Usage
Here's a simple example of how to use QueryBuilderHelper:
```php
use Guagualai\QueryBuilderHelper\SqlHelper;
use Illuminate\Database\Eloquent\Model;

class YourModel extends Model
{
    // Your model's methods...
}

$query = YourModel::where('column', 'value')->getQuery();
$sqlWithBindings = SqlHelper::getWithBindings($query);

echo $sqlWithBindings;
```

This will output the raw SQL query with the bindings included, making it easier to see the actual query that will be run against the database.

## Example Output
When you use the QueryBuilderHelper, you might see output similar to the following:

```php
// Example Eloquent query
$query = YourModel::where('name', 'John')->where('age', '>', 25)->getQuery();
$sqlWithBindings = SqlHelper::getWithBindings($query);

echo $sqlWithBindings;
```
The output will be:

```sql
select * from `your_models` where `name` = 'John' and `age` > 25
```

## License
The MIT License (MIT). Please see License File for more information.