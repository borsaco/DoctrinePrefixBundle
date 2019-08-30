# DoctrinePrefixBundle
Bundle to add prefix to tables and columns database

### Install
Via Composer

```
composer require borsaco/doctrine-prefix-bundle
```

### Configuration example

You can configure prefixes and base naming strategy in config files:

```yaml
config/packages/doctrine_prefix.yaml

doctrine:
  orm:
    naming_strategy: Borsaco\DoctrinePrefixBundle\Doctrine\ORM\Mapping\PrefixNamingStrategy

doctrine_prefix:
  table_prefix: bor_
  column_prefix: sac_
  naming_strategy: doctrine.orm.naming_strategy.underscore
```
