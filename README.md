# Intelimotor PHP Client
Una implementación no oficial de la API para Intelimotor.

## Notas
Esta librería NO está relacionada con Intelimotor de ninguna manera y/o forma. Es simplemente un trabajo derivado para
poder utilizar la API de Intelimotor de una manera práctica y sencilla mediante modelos POPO (Plain Old PHP Objects).

## Instalación
### Dependencias
Esta librería depende de un cliente HTTP que implemente el estándar PSR-18 y una librería que implemente el estándar 
PSR-7 y PSR-17. Puede instalar las librerías de referencia para esta implementación de la siguiente manera:

    composer require symfony/http-client
    composer require nyholm/psr7

### Librería
La instalación del cliente es simple, solo debes ejecutar el siguiente comando:

    composer require instacar/intelimotor-api-client

## Uso
Para usar el cliente puedes crear una instancia por defecto que se encargará de crear el cliente HTTP basado en Symfony
y la implementación PSR-7 de Nyholm con las configuraciones recomendadas. El cliente tiene un método por cada punto 
final de la API de Intelimotors. Por ejemplo, para solicitar las marcas de vehículos:

~~~php
use Instacar\IntelimotorApiClient\IntelimotorClient;

$cliente = IntelimotorClient::createDefault($apiKey, $apiSecret);
$marcas = $cliente->getBrands();
~~~

Nota: Para crear mensajes en el CRM de Intelimotor primero debe obtener una [clave de API](https://app.intelimotor.com/settings) 
específica para el canal y configurar un alias para el canal en el cliente de Intelimotor:

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
Si deseas utilizar tus propias implementaciones del cliente HTTP PSR-18 o PSR-7, puedes instanciar directamente el 
``IntelimotorClient`` con las dependencias necesarias.

~~~php
use Instacar\IntelimotorApiClient\IntelimotorClient

$cliente = new IntelimotorClient($psr18HttpClient, $psr17RequestFactory, $psr17StreamFactory, $apiKey, $apiSecret);
~~~

## Licencia
Esta librería utiliza la licencia Lesser General Public Licence Version 3 (LGPLv3). Puede consultarla en el archivo
[LICENSE](LICENSE).

## Registro de cambios
### v2.1.0
- Se mejoró las excepciones para derivar de la interfaz ClientExceptionInterface.
- Se agregó una nueva excepción para el estatus HTTP 404 No encontrado.
#### CAMBIOS ROMPEDORES
- Se eliminó la excepción ForbiddenHttpException.

### v2.0.0
- Se migró el código para utilizar los estándares PSR-7, PSR-17 y PSR-18 para las llamadas HTTP a la API de Intelimotor.
- Se actualizó la versión mínima de PHP a 8.1 y de Symfony a 5.4.

### v1.2.2
- Se simplificó el código para normalizar las estampas de tiempo.
- Se declaró la zona horaria UTC para las estampas de tiempo.
- Se actualizaron las dependencias a las últimas disponibles.

### v1.2.1
- Se actualizaron las dependencias de los componentes de Symfony para soportar Symfony 6.
- Se actualizaron las dependencias de interfaces de Symfony para soportar PHP 8.1.

### v1.2.0
- Se implementaron los puntos finales para extraer las unidades vendidas y no vendidas únicamente.
- Se implementaron los puntos finales para extraer las unidades únicamente de una unidad de negocio.

### v1.1.1
- Se corrigió el método "hasCustomTrim" para volverlo público y accesible.
- Se corrigió un getter que decía "getSold" en vez de "isSold".

### v1.1.0
- Se agregó la funcionalidad para crear mensajes de contacto en el CRM de Intelimotors.
- Se mejoró la extracción de información de las unidades con más campos extraídos de Intelimotors.


### v1.0.1
- Se depreció el configurar manualmente el serializador, debido a que está fuertemente acoplado con el funcionamiento
interno de la librería, y no hay una necesidad real de reemplazarlo de parte del usuario.
- Se actualizaron las librerías del proyecto.

### v1.0.0
- Soporta BusinessUnits, Colors, Brands, Models, Years, Trims y Units.
- Soporta operaciones sobre items, colecciones y archivos CSV.
- Utiliza clases PHP para representar los Modelos.