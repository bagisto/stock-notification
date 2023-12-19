# Introduction:

Reduce abandonment caused due to stock unavailability and improve the online shopping experience by allowing customers to sign up for out-of-stock products.

* Notify the customers when the products are back in stock.
* Helps analyze the products which are in high demand.
* Auto or manually send email notifications.
* Allows both registered as well as guest users to subscribe for out-of-stock products.
* Improve customer satisfaction.

## Features:

* Buyers can register themselves for the notification e-mail for out-of-stock products.
* Buyers will receive an e-mail when the product is in stock.
* Admin can see the list of all the users who registered themselves for the notification  product-wise at the back end.
* Admin gets to know the demand for a product and can order the products accordingly.
* Buyers can register themselves for a particular combination of products.
* Send in-stock email alerts to all subscribed users of selected products in bulk.
* Admin can send the mail manually from the back end.

### Requirements:

* **Bagisto**: v2.0.0
* **Tailwind CSS**

### Installation:

-> Unzip the respective extension zip and then merge "packages" folder into project root directory.

* Goto **config/app.php** file and add following line under 'providers'
~~~
Webkul\Notify\Providers\NotifyServiceProvider::class
~~~

* Goto composer.json file and add following line under 'psr-4'
~~~
"Webkul\\Notify\\": "packages/Webkul/Notify/src"
~~~

* Run these below commands to complete the setup:
~~~
composer dump-autoload
~~~
~~~
php artisan migrate
~~~
~~~
php artisan optimize:clear
~~~
~~~
npm install
npm run dev
~~~
~~~
php artisan vendor:publish --force
~~~

That's it, now just execute the project on your specified domain.
