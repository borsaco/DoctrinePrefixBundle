# DoctrinePrefixBundle
Bundle to add prefix to tables and columns database

### Configuration example

You can configure prefixes and base naming strategy in config files:

```yaml
doctrine:
    # ...
    orm:
        # ...
        naming_strategy: doctrine_prefix.prefix_naming_strategy

doctrine_prefix:
    table_prefix: bo_ # default ''
    column_prefix: sa_ # default ''
    naming_strategy: doctrine.orm.naming_strategy.underscore # default - 'doctrine.orm.naming_strategy.default'
```
