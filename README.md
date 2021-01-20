# Run Server fundation_api
`   php -S localhost:8000 -t public`

# Models
#### Supply
    'name',
    'id_property',
    'description',
    'amount'

#### Oxigen
    'id_property',
    'description',
    'capacity',
    'amount'


# Routes
    url = localhost:8000/api

#### GET
    url/supplys
    url/supplys/write_id_supply
    url/supplys?idProperty=write_id_proterty
    url/supplys?name=write_name_supply
    url/oxigens
    url/oxigens/write_id_oxigen
    url/oxigens?idProperty=write_id_proterty

    [Auth]
    url/user      -> required => ['api_token']

#### POST
    url/supplys   -> required => ['name','id_property','amount']
    url/oxigens   -> required => ['capacity','id_property','amount']
    url/user      -> required => ['name', 'email', 'password']
    url/login     -> required => ['email', 'password']

    [Auth]
    url/logout     -> required => ['api_token']

#### PUT [Auth]
    url/supplys/write_id_supply   -> required the same post supply
    url/oxigens/write_id_oxigen   -> required the same post oxigen

#### DELETE [Auth]
    url/supplys/write_id_supply 
    url/oxigens/write_id_oxigen 


## License

    The Lumen framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
