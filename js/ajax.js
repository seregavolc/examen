$(document).ready(function(){ //после загрузки документа
    
    $('#raschet').click(function(){     //при изменении любого элемента класса .filter
        //читаем значения элементов, которые понадобятся для расчета или ввода или выборки данных по их ИД
       let d1 = document.getElementById('d1').value ;
       let  d2 = document.getElementById('d2').value ;
      let   cena = document.getElementById('cena').innerHTML;
     
//отправляем на сервер запрос ajax
        $.ajax({
            type: 'POST', //метод
            url: "rashet",  //какому скрипту отправляем или в какой метод контроллера, котроый будет делать расчет или выборку или ввод
            data:({d1: d1, d2:d2, cena:cena}),    //какие данные отправляем
            dataType:'html',        //в каком коде получим результат
            success: function(result){//что делать после успешного получения результата
                alert('result');
                $('#price').empty().append(result); //в элемент с определенным ИД запишем это результат ( поменяем верстку)
            }
        })
    })
})  
