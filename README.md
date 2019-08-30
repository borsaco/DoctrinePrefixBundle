# DoctrinePrefixBundle
Bundle to add prefix to tables and columns database

### Configuration example

You can configure prefixes and base naming strategy in config files:

```yaml
doctrine:
  orm:
    naming_strategy: Borsaco\DoctrinePrefixBundle\Doctrine\ORM\Mapping\PrefixNamingStrategy

doctrine_prefix:
  table_prefix: bor_
  column_prefix: sac_
  naming_strategy: doctrine.orm.naming_strategy.underscore
```
