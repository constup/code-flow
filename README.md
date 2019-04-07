# Constup Code Flow

## Description

Classes in the `Message` directory are the main feature of this package. They are intended
to be used as:

- return arguments in methods which are not returning anything else;
- result capturing objects for error and exception handling

The default class is `GenericFlowMessage`. You can use it through `GenericFlowMessageInterface`.

## Example use


### Example #1 - Handling exceptions
```php

try {
...
} catch (\Exception $e) {
    return new GenericFlowMessage(
        false,
        true,
        $e,
        'EXC-001',
        'An exception has occured',
        LogLevel::CRITICAL,
        true
    );
}

```

## Code Flow Classes

### `GenericFlowMessage` (`GenericFlowMessageInterface`)

#### Generic flow message properties

- `success` - set to `true` if the execution result is a success;
- `exception` - set to `true` if the result is an exception. Used in `catch` code block;
- `exception_object` - pass the exception object here, if there is any;
- `code` - execution return code. Can be used for both success and failure results;
- `message` - execution return message. Can be used for both success and failure results;
- `log_level` - if the result is an error, pass the PSR-3 compatible log level here.
You can use it later for logging;
- `capture_stack_trace` - set to `true` if you want the stack trace (string) to be stored in 
`stack_trace` property; 
- `stack_trace` - Default is an empty string and it's not used in the constructor. Stack trace
string will be stored here if `capture_stack_trace` is set to `true`.
