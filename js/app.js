var formulario = document.getElementById('formulario');

formulario.addEventListener('submit', function(e){
    e.preventDefault();
    console.log('me diste click');

    //var datos = new FormData(formulario);

   

    let ArraySeed = ("{\"b64Key\": \"BsEf/RMnjIPMy0Lz17PM/xtNa/0XLd8sv6aTKDxNCKo=\",\"b64IV\": \"YYkcoq6ow8hnGwHkRPsdDQ==\",\"id\": 1}")
    let seedJson = JSON.parse(ArraySeed)
    let iv = (seedJson.b64IV)
    console.log(seedJson)
     let stringjson = ("{\"deviceId\":\"8f25831d-be37-48fb-9539-84cef7da22cc\",\"username\":\"USERAPI-161-35A2FF\"}")
    let dataSet = JSON.parse(stringjson)
    let archive = ("161")
    let seed =  (seedJson)
    let token = ("147a37d85ab83f1c31bd01a4b72e8b76f607c7ba5fd43ce51f22820a1da05168")
    let deviceId = (dataSet.deviceId)
    let payload = {
        protocolId: Number(archive),
        bookCollectionId: 'luis',
        label: 'solicitante1',
        startFolio: 1,
        startBook:1
    }


    let encryptedBody = cipherSuite.getEncryptedBody(payload, seed, token, deviceId)

    let body = JSON.stringify(encryptedBody)

    //console.log(seed)

    console.log(body) 

    window.location.href = "createInstrumentBook.php?dataBody=" + body; 

})