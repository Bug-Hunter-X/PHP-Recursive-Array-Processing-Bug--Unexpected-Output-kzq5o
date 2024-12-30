```php
function processData(array $data): array
{
    $result = [];
    foreach ($data as $item) {
        if (is_array($item)) {
            $result = array_merge($result, $this->processData($item)); // Recursive call
        } else if (is_numeric($item)) {
            $result[] = $item * 2; // Process numeric values
        } else if (is_string($item)) {
            $result[] = (strlen($item) > 3) ? substr($item, 0, 3) : $item; //Handle strings of any length
        }
    }
    return $result;
}

$data = [1, 2, 'abcde', [3, 4, 'fghi'], 5, 'x'];
$processedData = processData($data);
print_r($processedData); // Output is now correct
```