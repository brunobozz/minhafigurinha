function getFileName(elm) {
    var fn = $(elm).val();
    var filename = fn.match(/[^\\/]*$/)[0]; // remove C:\fakename
    //$('.figurinha__foto').css('background-image', 'url(' + filename + ')');
    $('.figurinha__foto').attr('src', filename);

    //$('#fileName').attr('value', filename);
}

$(document).ready(function () {

    var element = $(".a3"); // global variable
    var getCanvas; // global variable

    $("#btn-Preview-Image").on('click', function () {

        html2canvas(element, {
            onrendered: function (canvas) {
                //$("#previewImage").append(canvas);
                getCanvas = canvas;

                // var w = window.open();
                // $(w.document.body).html(getCanvas);

                var imgData = getCanvas.toDataURL("image/jpeg", 1.0);
                var pdf = new jsPDF();

                pdf.addImage(imgData, 'JPEG', 0, 0);
                pdf.save("download.pdf");
            }
        });
    });

    $(".draggable").draggable({
        drag: function () {
            var top = $(this).css('top');
            $('.draggable_copy').css('top', top);
            var left = $(this).css('left');
            $('.draggable_copy').css('left', left);
        }
    });

    $("#pdfDown").on('click', function () {

        var nome = $('#nome').val();
        var tipo = $('#tipo').val();

        html2canvas(element, {
            onrendered: function (canvas) {
                //$("#previewImage").append(canvas);
                getCanvas = canvas;
            }
        });
        kendo.drawing
            .drawDOM(".a3",
                {
                    paperSize: "A3",
                    margin: { top:"0.5cm", left:"0.5cm", bottom:"0.5cm", right:"0.5cm" },
                    scale: 0.38,
                    height: 500,
                    landscape: true,
                    //template: $(".a3").html(),
                })
            .then(function (group) {
                kendo.drawing.pdf.saveAs(group, "fig_"+tipo+"_"+nome+".pdf")
            });
    });

});


