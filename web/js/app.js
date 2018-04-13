function loadSelect(uri, selectSup, selectInf, defaultText)
{
    $.ajax({
        url : uri,
        dataType : 'json',
        type : 'GET',
        success : function(data){
            $(selectInf).empty();
            $(selectInf).append('<option value="0">'+defaultText+'</option>');
            for(i = 0; i < data.length; i++){
                $(selectInf).append($('<option>', {
                    value: data[i].id,
                    text: data[i].libelle
                }));
            }
        },
        error : function(e, y, s){
            alert(ys);
        }
    });
}

