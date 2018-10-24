# Limit Products in Cart
Restricts user Carts to only have a single item. Useful for "gift" shops where each user may select one item.

## Architecture
Modules that require theme changes <- Core theme -> Child "skin" themes

**Standalone modules** (This Repo) -> (no dependencies)

## Installation

```bash
# as root
systemctl stop cron
```

```bash
# as user
magento maintenance:enable
composer config repositories.magento-limit-products-in-cart vcs https://github.com/bazedk/magento-limit-products-in-cart
composer require bazedk/magento-limit-products-in-cart:dev-master
magento module:enable Baze_LimitProductsInCart
magento setup:upgrade
magento setup:di:compile
magento setup:static-content:deploy {en_US,da_DK}
magento cache:clean
magento cache:flush
magento maintenance:disable
```

```bash
# as root
systemctl restart php7.1-fpm
systemctl start cron
```
