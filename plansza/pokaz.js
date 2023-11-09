// $(document).ready(function() {
//     $("#myX").on("input", function() {
//         var wartoscSuwakaX = $(this).val();
//         $("#wartoscSuwakaX").text(wartoscSuwakaX);
        
//         // Wysyłamy wartość suwaka na serwer za pomocą AJAX
//         $.ajax({
//             type: "POST",
//             url: "update.php", // Tu podaj ścieżkę do pliku PHP obsługującego zaktualizowanie wartości suwaka
//             data: { myX: wartoscSuwakaX },
//             success: function(response) {
//                 // Możesz obsłużyć odpowiedź z serwera, jeśli to konieczne
//             }
//         });
//     });
// });