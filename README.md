# Open Data for Cameroon

This project is aimed to be a central hub for all public data in Cameroon. It's open for contributions by any party. 
The project kicks off just with the API version where data can be accessed through endpoints e.g `https://base-url/api/regions` and a sample response of 
```
"title": "Regions",
    "description": "The list of all regions in Cameroon and their capitals with other  useful information\n",
    "data": {
        "regions": [
            {
                "name": "Adamawa",
                "capital": "Ngaoundere",
            },
            {
                "name": "Centre",
                "capital": "Yaounde"
            },
            {
                "name": "East",
                "capital": "Bertoua"
            },
            {
                "name": "Far North",
                "capital": "Maroua"
            },
            {
                "name": "Litorral",
                "capital": "Douala"
            },
            {
                "name": "North",
                "capital": "Garoua"
            },
            {
                "name": "Northwest",
                "capital": "Bamenda"
            },
            {
                "name": "South",
                "capital": "Ebolowa"
            },
            {
                "name": "Southwest",
                "capital": "Buea"
            },
            {
                "name": "West",
                "capital": "Bafoussam"
            }
        ]
    }
}
```

This will be very useful for anyone building anything and requires this data to access it easily. People can even build their project relying on it as one source of data.

## Stack
The project is built with PHP and the Symfony framework. Knowledge of `YAML` is required if contributing on data. More on [`YAML`](https://yaml.org) at [yaml.org](https://yaml.org)


## Getting Started

### Symfony Binary

1. Clone the project locally
2. Install dependencies with Composer - `composer install` (more on Composer at [composer.org](https://composer.org))
3. Run the Symfony web server `symfony server:start -d` or point to any virtual host you use

### Docker
1. If not already done, [install Docker Compose](https://docs.docker.com/compose/install/) (v2.10+)
2. Run `docker compose build --no-cache` to build fresh images
3. Run `docker compose up --pull always -d --wait` to set up and start a fresh Symfony project
4. Open `https://localhost` in your favorite web browser and [accept the auto-generated TLS certificate](https://stackoverflow.com/a/15076602/1352334)
5. Run `docker compose down --remove-orphans` to stop the Docker containers.

### Contributing
- You can contribute with data-We greatly need this and we appreciate your time and efforts-in the directory `data`, you can create a `yaml` file depending on the data you want to contributing e.g `restaurants.yaml`. Check [yaml.org](https://yaml.org) for markup instructions
- You can also contribute by improving the code. More endpoints will have to be created depending on the data available. 
  1. Code has been simplified and the parsing of `Yaml` files moved to an Abstract controller
  2. What is needed is to create a controller with a route matching the name of the `Yaml` file in the data directory (this is optional). The route can be named anything
  3. Send your pull requests.
- Why should you contribute?
  - To participate in the digitalisation of our beloved country Cameroon through open data
  - To be part of an open source initiative
  - To use one of the most popular yet simple technology
  - And to be an awesome person.
  


## Features

* Provides open data to the public
* API based (web frontend coming up depending on the need)
* New ideas are welcomed through the Discussion Tab here on Github or through Github issues

### Endpoints
The available endpoints can be gotten using the command `php bin/console debug:router`


**Enjoy!**


## License

Cameroon Open Data is available under the MIT License.

## Credits

Created by Abdellah Ramadan.
