
 function teste () {
     let options = {
         method : 'GET',
     }

     fetch(`../pdo/controller.php`, options).then(function (response) {
         if (!response.ok) {
             //
             return false;
         }
         response.json().then(function (retorno) {
             if (retorno) {
                 //
             } else {
                 //
             }
         });
     });
 }