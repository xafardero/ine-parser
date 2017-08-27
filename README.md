#Relacion de codigos postales y ines.

##Requiere: 
[Descargar](http://www.ine.es/ss/Satellite?L=es_ES&c=Page&cid=1254735624326&p=1254735624326&pagename=ProductosYServicios%2FPYSLayout) callejero del censo electoral del INE, descomprimirlo i guardar el fichero aqui:
```
var/TRAMOS-NAL.F161231
```
##uso:
```
composer install
php bin/console.php app:parse-ine
```

##Output:
Ejemplo del CSV:
```
['province_id' => '01','ine' => '010014','postal_code' => '01240', 'name' => 'ALEGRIA-DULANTZI'],
['province_id' => '01','ine' => '010014','postal_code' => '01193', 'name' => 'EGILETA'],
['province_id' => '01','ine' => '010029','postal_code' => '01468', 'name' => 'ALORIA'],
['province_id' => '01','ine' => '010029','postal_code' => '01470', 'name' => 'AMURRIO'],
['province_id' => '01','ine' => '010029','postal_code' => '01468', 'name' => 'ARTOMAÑA'],
['province_id' => '01','ine' => '010029','postal_code' => '01468', 'name' => 'DELIKA'],
['province_id' => '01','ine' => '010029','postal_code' => '01450', 'name' => 'LEKAMAÑA'],
['province_id' => '01','ine' => '010029','postal_code' => '01468', 'name' => 'SARATXO'],
['province_id' => '01','ine' => '010029','postal_code' => '01468', 'name' => 'TERTANGA'],
['province_id' => '01','ine' => '010029','postal_code' => '01450', 'name' => 'BARANBIO'],
```
