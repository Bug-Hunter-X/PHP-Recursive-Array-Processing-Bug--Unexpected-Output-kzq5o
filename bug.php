```php
function processData(array $data): array
{
    $result = [];
    foreach ($data as $item) {
        if (is_array($item)) {
            $result = array_merge($result, $this->processData($item)); // Recursive call
        } else if (is_numeric($item)) {
            $result[] = $item * 2; // Process numeric values
        } else if (is_string($item) && strlen($item) > 3) {
            $result[] = substr($item, 0, 3); //Process strings longer than 3 characters
        }
    }
    return $result;
}

$data = [1, 2, 'abcde', [3, 4, 'fghi'], 5, 'x'];
$processedData = processData($data);
print_r($processedData); // Output will be unexpected
```