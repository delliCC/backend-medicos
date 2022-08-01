# Laravel Vuexy :: Skeleton

## Step 1: Clone the repository


    git clone git@github.com:JoseAcopa/skeleton-vuexy-laravel.git

## Step 2: Open terminal and locate in the **.docker** folder and run the following command

    docker-compose up -d --build

## Step 3: To install the composer packages run the following command

    docker-compose run cli composer install

## Step 4: In the root directory, you will find a file named **.env.example**, rename the given file name to **.env** and run the following command to generate the key

    docker-compose run cli php artisan key:generate

## Step 5: By running the following command, you will be able to get all the dependencies in your node_modules folder:

    docker-compose run node yarn

## Step 6:To run the project, you need to run following command in the project directory. It will compile the php files & all the other project files. If you are making any changes in any of the php file then you need to run the given command again.

    docker-compose run node yarn mix

## Step 7: Go to **localhost**
