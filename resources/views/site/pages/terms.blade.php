@extends('layouts.master')

@section('content')

<section class="intro flex items-center justify-center py-6 bg-grey-100 bg-scroll bg-center bg-no-repeat"
    style="background-image: url({{ asset('assets/images/wave.png') }})">

    <img src="{{ asset('assets/images/contact-logo.png') }}">
</section>

<section class="bg-white">
    <div class="max-w-7xl mx-auto">
        <div class="bg-secondary rounded-lg shadow-2xl px-4 sm:px-0 sm:pt-0">
            <h2 class="px-4 text-4xl text-white text-center font-light pt-4 pb-6">
                Términos y Condiciones
            </h2>
        </div>
    </div>
</section>


<section class="py-8 bg-gray-100 -mt-2">
    <div class="max-w-7xl mx-auto">

        <div class="flex flex-wrap px-5">

            <div class="w-full sm:pr-16">

                <!-- Punto 1 -->

                <h2 class="font-bold pb-2 text-primary">1- Introducción</h2>

                <p class="font-light leading-normal text-left pb-4 text-gray-800">
                    Plasticoin es una moneda virtual que se otorga a cambio de los plásticos reciclables que los
                    usuarios separan y llevan a reciclar mediante un sistema de incentivos en el que pueden canjearlos
                    por descuentos en productos y servicios sostenibles. De esta forma se promueve el reciclaje e
                    impulsa una economía verde y solidaria, donde se le da espacio a empresas y a emprendimientos
                    responsables que ofrecen productos o servicios para incentivar el manejo responsable de los residuos
                    plásticos y la limpieza de playas.
                </p>


                <!-- Punto 2 -->

                <h2 class="font-bold pb-2 text-primary">2. Sistema de acumulación de Plasticoins</h2>

                <p class="font-light leading-normal text-left pb-4 text-gray-800">
                    El usuario debe llevar los plásticos acumulados (dentro de las categorías pre establecidas) a los
                    centros de acopio o puntos de recolección autorizados. El encargado del punto de recolección, a
                    través de la plataforma, le asignará los Plasticoins correspondientes según la cantidad y
                    clasificación de los plásticos que el usuario entregue. Para ello, el usuario debe brindar en cada
                    visita al centro de acopio o punto de recolección autorizado un número de celular válido al que le
                    llegará un mensaje indicándole los plasticoins aplicados a su favor.
                    <br>
                    Los plasticoins tienen una vigencia máxima de 1 año. Luego de este periodo si los plasticoins no han
                    sido redimidos o utilizados, se transfieren a beneficio de una causa social que la plataforma
                    determinará a su discreción.
                </p>


                <!-- Punto 3 -->

                <h2 class="font-bold pb-2 text-primary">3. Materiales aceptados</h2>

                <p class="font-light leading-normal text-left pb-4 text-gray-800">
                    Cabe destacar que la organización solo recibirá plásticos que sean lavados adecuadamente,
                    clasificados y compactados al mínimo volumen posible y estos obtendrán su valor de canje en
                    “plasticoins” acorde a su peso, tamaño y su dificultad de recolección.. Únicamente se aceptarán
                    aquellos plásticos que se entregan limpios, secos, sin restos de alimentos o sucios con aceites.
                    Queda a discreción del encargado del centro de acopio autorizado la recepción de los materiales
                    luego de la valoración de estos, en caso que los materiales no cumplan con las condiciones, el
                    centro de acopio puede negar la aplicación de los Plasticoins.
                    <br>
                    El monto de Plasticoins que recibe el usuario al entregar los plásticos aceptados en el programa se
                    definen según una fórmula pre establecida donde influyen el peso, la procedencia y el tamaño de los
                    materiales plásticos entregados. Este valor puede ser actualizado sin previo aviso a discreción de
                    Plasticoin.
                    <br><br>
                    A continuación un detalle de los materiales que se reciben:<br><br>

                    <span class="text-secondary">a. Microplástico y Pellets – </span>por su tamaño (hasta 10mm) y
                    dificultad de recolección estos tienen mayor valor de canje en “plasticoins”. Tienen además el mayor
                    valor respecto a su peso y pequeñas cantidades podrían significar recompensas o descuentos
                    considerables por medio de “plasticoins”. Cabe destacar que solo se recibirán pellets recogidos de
                    las playas y se realizará una inspección minuciosa para garantizar su procedencia. Valor : 1kg = 400
                    Plasticoins
                    <br><br>
                    <span class="text-secondary">b. Residuos Plásticos de Playa – </span>Lo conforman todos los
                    plásticos recolectados en la playa mayores a los 10mm, pudiendo ser piezas enteras o secciones y
                    también se debe poder constatar que procedan de la playa o ambiente público. 1kg = 200 Plasticoins
                    <br><br>
                    <span class="text-secondary">c. Plástico domiciliario – </span>Esta categoría está conformada por
                    todos los plásticos domiciliarios de un solo uso, como contenedores de comidas, envases de
                    cosméticos, lapiceras, electrónicos, etc. 1kg = 100 Plasticoins
                </p>

                <!-- Punto 4 -->

                <h2 class="font-bold pb-2 text-primary">4. Uso del sitio Plasticoin.com.uy</h2>

                <p class="font-light leading-normal text-left pb-4 text-gray-800">
                    Plasticoin es dueño único y exclusivo, de todos los derechos, título e intereses en y del sitio web,
                    de todo el contenido (incluyendo audio, fotografías, ilustraciones, gráficos, otros medios visuales,
                    videos, textos, software, títulos, etc.), el diseño y la organización del sitio web y la compilación
                    de los contenidos, incluyendo derechos de autor, derechos de marca y otras propiedades
                    intelectuales. El uso del sitio web no otorga propiedad de ninguno de los contenidos, datos o
                    materiales a los que pueda acceder en o a través del sitio web. </p>

                <!-- Punto 4.1 -->

                <h2 class="font-bold pb-2 text-primary">4.1. Propiedad intelectual</h2>

                <p class="font-light leading-normal text-left pb-4 text-gray-800">
                    Plasticoin es dueño único y exclusivo, de todos los derechos, título e intereses en y del sitio web,
                    de todo el contenido (incluyendo audio, fotografías, ilustraciones, gráficos, otros medios visuales,
                    videos, textos, software, títulos, etc.), el diseño y la organización del sitio web y la compilación
                    de los contenidos, incluyendo derechos de autor, derechos de marca y otras propiedades
                    intelectuales. El uso del sitio web no otorga propiedad de ninguno de los contenidos, datos o
                    materiales a los que pueda acceder en o a través del sitio web.
                </p>

                <!-- Punto 4.2 -->

                <h2 class="font-bold pb-2 text-primary">4.2. Marcas comerciales</h2>

                <p class="font-light leading-normal text-left pb-4 text-gray-800">
                    Logos, marcas de servicios, marcas registradas (“Marcas Comerciales”) expuestas en el sitio web o en
                    los contenidos disponibles a través del sitio web son Marcas Comerciales registradas y no
                    registradas, y no pueden ser usadas con respecto a productos y/o servicios que no estén
                    relacionados, asociados o patrocinados por sus poseedores de derechos y que puedan causar confusión
                    a los clientes, o de alguna manera que denigre o desacredite a sus poseedores de derechos.
                    <br>
                    Todas las Marcas Comerciales que no sean Plasticoin que aparezcan en el sitio web o a través de los
                    servicios del sitio web, mediante hipervínculos, son propiedad de sus respectivos dueños. Nada que
                    esté contenido en el sitio web deberá ser interpretado como otorgando, por implicación,
                    desestimación, o de otra manera, alguna licencia o derecho para usar alguna Marca Comercial expuesta
                    en el sitio web sin el permiso escrito de Plasticoin o de terceros que puedan ser dueños de dicha
                    Marca Comercial.
                </p>

                <!-- Punto 4.3 -->

                <h2 class="font-bold pb-2 text-primary">4.3. Hipervínculos comerciales</h2>

                <p class="font-light leading-normal text-left pb-4 text-gray-800">
                    El sitio, posee vínculos a sitios fuera del dominio de Plasticoin, cuyo contenido es responsabilidad
                    única, de sus respectivos titulares, y Plasticoin no se hace responsable por el contenido de estos
                    sitios.
                </p>

                <!-- Punto 4.4 -->

                <h2 class="font-bold pb-2 text-primary">4.4. Información personal</h2>

                <p class="font-light leading-normal text-left pb-4 text-gray-800">
                    • Plasticoin podrá recoger información personal como: nombre, dirección de correo electrónico e
                    información demográfica. Así mismo cuando sea necesario podrá ser requerida información específica
                    para procesar algún pedido o realizar una entrega o facturación.
                    <br><br>
                    • Plasticoin utiliza su información con el fin de llevar el control y contabilizar los puntos
                    recibidos por los materiales entregados en los centros de acopio autorizados, con el fin de ser
                    canjeados por medio del sitio web y sus empresas afiliadas cuando se requiera. Además, para mantener
                    un registro de usuarios, de pedidos en caso de que aplique, y mejorar los servicios otorgados por
                    medio del sitio web.
                    <br><br>
                    • Plasticoin no venderá, cederá ni distribuirá esta información personal que es recopilada sin su
                    consentimiento, salvo que sea requerido por un juez con una orden judicial.
                    <br><br>
                    • Como parte de la comunicación del programa, Plasticoin podrá enviar correos electrónicos
                    periódicamente a través del sitio web con ofertas, nuevos productos o emprendimientos y cualquier
                    otra información que considere relevante para los usuarios, estos correos electrónicos serán
                    enviados a la dirección que cada usuario proporcione.
                    <br><br>
                    • Órdenes de Productos y Servicios
                    Se colocarán productos y servicios en el catálogo del sitio web a disposición del usuario registrado
                    para canjear sus Plasticoins, redireccionándolo a la plataforma de la empresa dueña del producto o
                    servicio. .
                    <br>El usuario deberá saldar a la empresa dueña del producto o servicio la diferencia en moneda
                    local indicada luego de hacer efectivos los Plasticoins, en cualquier compra que realice el usuario,
                    ya sea por medio de tarjeta de crédito/débito o efectivo, coordinado directamente con la empresa
                    dueña del producto o servicio elegido.
                    <br>Todo servicio de envío, entrega de producto se debe coordinar directamente con la empresa
                    ofertante, siendo Plasticoin únicamente un intermediario de ambas partes sin responsabilidad alguna.
                    <br>Algunos productos que el usuario compre a través del sitio web pueden estar sujetos a términos y
                    condiciones adicionales por parte de la empresa dueña del producto o servicio que le serán
                    presentados al momento de dicha compra o descarga.
                    <br>Las garantías y reclamos asociados a cualquier producto o servicio es de entera responsabilidad
                    de la empresa dueña del producto o servicio. Plasticoin no se hace responsable de cualquier daño y/o
                    perjuicio que la persona pueda sufrir producto de la compra de algún bien o servicio que se realice
                    a través de la plataforma.
                </p>

                <!-- Punto 4.5 -->

                <h2 class="font-bold pb-2 text-primary">4.5 Mantenimiento y disponibilidad de productos en el sitio web
                </h2>

                <p class="font-light leading-normal text-left pb-4 text-gray-800">
                    Cada marca y empresa gestiona su propia tienda, además de programar, mantener y actualizar el
                    catálogo online de Plasticoin Cada empresa deberá garantizar la existencia del producto y contactar
                    directamente al usuario para coordinar la entrega del bien o servicio adquirido después de recibidas
                    las órdenes de compra.
                    <br>Cada empresa se deberá hacer responsable por la entrega del producto o servicio. Plasticoin no
                    se hace responsable por la tardanza o incumplimiento en la entrega de los productos o servicios
                    contratados por medio de la plataforma.
                </p>

                <!-- Punto 5 -->

                <h2 class="font-bold pb-2 text-primary">5. Copyright</h2>

                <p class="font-light leading-normal text-left pb-4 text-gray-800">
                    Si el usuario considera que su copyright ha sido violado en el sitio Plasticoin, puede comunicarse
                    directamente con nosotros al correo electrónico: info@plasticoin.com.uy
                </p>

                <!-- Punto 6 -->

                <h2 class="font-bold pb-2 text-primary">6. Limitaciones de responsabilidad civil y garantías</h2>

                <p class="font-light leading-normal text-left pb-4 text-gray-800">
                    Hasta la máxima medida permisible por las leyes aplicables, Plasticoin expresamente niega todas las
                    garantías, expresas o implicadas, incluyendo, sin limitación, garantías implicadas de
                    comerciabilidad e idoneidad para cualquier propósito en particular. no hay garantía de que cualquier
                    información o servicio proporcionado en este sitio o al cual se haga referencia en el mismo es
                    exacto, de que dicha información o servicio llenará cualquiera de sus propósitos o necesidades
                    particulares, o de que dicha información o servicio no infringe los derechos de un tercero, con la
                    excepción de cualquier garantía expresamente declarada en este sitio, de haberla, la información y
                    los servicios que se proporcionan en este sitio o a los cuales se hace referencia en el mismo se
                    brindan “as is” (tal y como aparecen), “as available” (según estén disponibles) todos los fallos o
                    defectos y el riesgo íntegro en cuanto a calidad y desempeño satisfactorios, exactitud y esfuerzo,
                    lo asume el usuario. Por consiguiente, aunque Plasticoin haga un esfuerzo razonable para incluir
                    información exacta y actualizada en el sitio, no da ninguna garantía ni hace declaración de ninguna
                    índole con respecto a su exactitud, prontitud o al hecho de que esté completa. Plasticoin no asume
                    responsabilidad civil ni responsabilidad alguna, de ninguna índole, por cualquier error u omisión en
                    el contenido del sitio.
                    <br>
                    De hecho, el uso del sitio de Plasticoin.com.uy corre por cuenta y riesgo de cada usuario; en la
                    máxima medida permitida por la ley, ni Plasticoin ni ninguna otra persona o entidad involucrada en
                    la creación, producción o entrega del sitio es responsable por ningún daño directo, indirecto,
                    incidental, emergente o punitivo, sin importar la manera en que fuere causado, que pudiere surgir
                    del acceso por parte del usuario al sitio, de su uso o del hecho de que el usuario dependa de dicho
                    sitio de alguna manera, aunque Plasticoin haya sido notificada de la posibilidad de dichos daños.
                    Plasticoin no asume responsabilidad alguna ni tendrá obligación alguna en relación con cualquier
                    daño que pudiera sufrir el equipo de computación o cualquier virus que pudiera afectar el computador
                    u otra propiedad del usuario por causa de su acceso al sitio de Plasticoin, su uso o descargas de
                    contenido de dicho sitio.
                </p>
            </div>
        </div>
    </div>
</section>

@endsection