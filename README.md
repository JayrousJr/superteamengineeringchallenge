## What i have  built
I have buikt an ERP "Mauzo" for MSMEs,  this is built with laravel blade. It can do the following.
1. allow user to login create Product Stock and record sales and can view recent sales made.
2. export detailed document on sales made and lke an invoice, pront all sales in csv and can print the inentory in pdf,
3. has a simple dashboard to show summary of the sales users and products.
   
## Assumption made
1. i have assumed that on updating the product the update on quantity means changing the whole quantity and note adding or subtracting the stock
2. there is no role based access
3. the csv does not need any setting up like head or styling


## How to run the repo
-git clone https://github.com/JayrousJr/superteamengineeringchallenge.git
-cd superteamengineeringchallenge
-composer install
-cp .env.example .env
-php artisan key:generate
-php artisan migrate
-php artisan serve

##design choice
i have used Laravel breeze,helps me to make authentication. Laravel MVP structure helps me to keep code reusable and clean.
i did not focus much on UI but on usability and speed, I used blade component to improve usability and mainatining a consistent layot. taht is 

##Link to Loom Video
https://www.loom.com/share/884ce88f07274de480f9bda6c8bffc4e
