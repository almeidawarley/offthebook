# Off The Book
Off The Book is an open-source songbook project for bands and workship ministeries. Have you ever had problems dealing with multiple arrangements when studying a new song? Do you feel like your group could benefit from having a centralized version of all songs in your repertoire? Would you like to digitalize your notes on songs and get rid of all that paper? If yes, Off The Book aims to meet your needs.

# Technologies

Off The Book uses [Laravel 6.2](https://laravel.com/docs/6.x) for its back-end implementation, [Materialize 1.0](https://materializecss.com/) for its CSS interface, and [Vue.js](https://vuejs.org/) for its Javascript-based components.

# Getting started

1. First of all, make sure you have Composer PHP dependency manager installed in your computer. You can obtain more information on how to install it in multiple operational systems [here](https://getcomposer.org/). 

2. Clone this repository, enter the folder and install Laravel and its dependencies with Composer:

```
git clone https://github.com/almeidawarley/offthebook.git
cd offthebook
composer install
```

3. Check the `.env.example` file and set the correct information to access your local database server. If you fail to do so, Laravel will not be able to run migrations and instantiate the database for the project. 

4. Run the migrations by typing the first command. In addition, you may want to add toy data with the seeder provided for testing by typing the second command.

```
php artisan migrate:refresh
php artisan db:seed
```

5. Initiate the local server and you're off to a great start! Laravel automatically starts your local server at localhost:8000

```
php artisan serve
```

# Ideas

The goal of this project was to practice my Laravel and Vue skills on a real-life application. Therefore, the current version has only simple features. However, the following improvements will be carried out in the future to allow better application in real-world scenarios.

## Technical improvements

- *Improve form validation*: The user may submit empty entries, e.g., add a listing without any name in the name field, and currently the system shows the Laravel standard error message. Therefore, there is room for better form validation;

- *Better request validation*: The user may submit invalid entries, such as special characteres in the chord name field. There is room for better request validation with Laravel personal requests options;

- *User interface standardization*: Even though there has been some effort to keep all screens similar to each other, there should be a more in-depth study of the best way to structure the interface;

- *Expansion of multi-language support*: Some buttons and labels already use the language file, which allows easier translation of the website based on the locale. However, there are stil a lot of places with stale text that wouldn't change if an effort to translate the application would be made.

## Extra functionalities

- *Transpose a song to the new key*: It is common on the daily routine to change the key of a song according to the vocalist. Therefore, it would be useful to automatically adapt the chords according to the current key based on the initial key;

- *Multiple type of users*: It may be relevant to create different types of users, and only allow specific functionalities to a group of users. For example, the worship leader may be the only one with the power to create listings, and members of the group can only search those listings.

## Bug corrections

- *Lyrics in other languaes*: The application relies on monospaced fonts to align the chords with the lyrics. However, those monospaced fonts don't work for languages with different alphabets (e.g., Korean, Japanese, Chinese, Thai, among others). Therefore, a better way to align chords with letters would allow the expansion of the system to those languages.

Feel free to get in touch if more functionalities come to mind :-)

# License

This software falls under the MIT License. Check the LICENSE file in this repository.