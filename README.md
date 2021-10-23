# Intelimotor PHP Client
Una implementación no oficial de la API para Intelimotor.

## Notas
Esta librería NO está relacionada con Intelimotor de ninguna manera y/o forma. Es simplemente un trabajo derivado para
poder utilizar la API de Intelimotor de una manera práctica y sencilla mediante modelos POPO (Plain Old PHP Objects).

## Instalación
### Dependencias
Esta librería depende de un cliente HTTP que implemente la interfaz de Symfony. Puede instalar el cliente de referencia
para esta implementación de la siguiente manera:

    composer require symfony/http-client

Igualmente, se requiere una librería para leer anotaciones. Se recomienda instalar la librería de Doctrine para esta
tarea de la siguiente manera:

    composer require doctrine/annotations

Nota: Si utilizas PHP 8.0, no requieres instalar la librería de anotaciones.
### Librería
La instalación del cliente es simple, solo debes ejecutar el siguiente comando:

    composer require instacar/intelimotor-api-client

## Uso
Para usar el cliente puedes crear una instancia por defecto que se encargará de crear el cliente HTTP basado en Symfony
y el serializador con las configuraciones recomendadas. El cliente tiene un método por cada punto final de la API de 
Intelimotors. Por ejemplo, para solicitar las marcas de vehículos:

~~~php
use Instacar\IntelimotorApiClient\IntelimotorClient;

$cliente = IntelimotorClient::createDefault($apiKey, $apiSecret);
$marcas = $cliente->getBrands();
~~~

Nota: Para crear mensajes en el CRM de Intelimotor primero debe obtener una [clave de API](https://app.intelimotor.com/settings) específica para el canal y
configurar un alias para el canal en el cliente de Intelimotor:

~~~php
$cliente->setChannel('contacto', 'abcdef1234567890...')
~~~

Cada entidad de la API está modelada con una clase PHP que tiene getters para cada una de las propiedades, con el fin de
proporcionar ayuda a los IDEs y autocompletar mejor, además de proporcionar tipos estrictos a cada una de las 
propiedades. Siguiendo con el ejemplo anterior:

~~~php
foreach ($marcas as $marca) {
    echo $marca->getId();   // El ID de la marca
    echo $marca->getName(); // El nombre de la marca
}
~~~

Si desea ver los métodos y modelos implementados, por favor, consulte la documentación.
### Avanzado
Si deseas utilizar tus propias implementaciones del cliente HTTP de Symfony, puedes instanciar directamente el 
``IntelimotorClient`` con el cliente HTTP.

~~~php
use Instacar\IntelimotorApiClient\IntelimotorClient

$cliente = new IntelimotorClient($clienteHttp);
~~~

Nota: Si utiliza esta manera de inicializar el cliente, usted es el responsable de proporcionar la url base junto con la
apiKey y el apiSecret al cliente. A continuación se anexa la configuración por defecto usada en 
``IntelimotorClient::createDefault``:

~~~php
use Instacar\IntelimotorApiClient\IntelimotorClient;
use Symfony\Component\HttpClient\HttpClient;

$httpClient = HttpClient::create([
    'base_uri' => 'https://app.intelimotor.com/api/',
    'headers' => [
        'Content-Type' => 'application/json',
    ],
    'query' => [
        'apiKey' => $apiKey, // La clave de API de Intelimotor
        'apiSecret' => $apiSecret, // El secreto de API de Intelimotor
    ],
]);

return new IntelimotorClient($httpClient);
~~~

## Licencia
Esta librería utiliza la licencia Lesser General Public Licence Version 3 (LGPLv3). Puede consultarla en el archivo
[LICENSE](LICENSE).

## Registro de cambios
### v1.0.0
- Soporta BusinessUnits, Colors, Brands, Models, Years, Trims y Units.
- Soporta operaciones sobre items, colecciones y archivos CSV.
- Utiliza clases PHP para representar los Modelos.

### v1.0.1
- Se depreció el configurar manualmente el serializador, debido a que está fuertemente acoplado con el funcionamiento
interno de la librería, y no hay una necesidad real de reemplazarlo de parte del usuario.
- Se actualizaron las librerías del proyecto.

### v1.1.0
- Se agregó la funcionalidad para crear mensajes de contacto en el CRM de Intelimotors.
- Se mejoró la extracción de información de las unidades con más campos extraídos de Intelimotors.

### v1.1.1
- Se corrigió el método "hasCustomTrim" para volverlo público y accesible.
- Se corrigió un getter que decía "getSold" en vez de "isSold".
