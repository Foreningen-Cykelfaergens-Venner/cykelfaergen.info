<!DOCTYPE html>
<html>
  <head>
    <style>
      body{
      	margin: 0;
        padding: 0;
      }
      
    </style>
  </head>
  <body>
    <script src="src/build/pdf.js"></script>
    <script>
    	var url = '<?= $_GET["file"]?>';

        //
        // The workerSrc property shall be specified.
        //
        pdfjsLib.GlobalWorkerOptions.workerSrc =
          'src/build/pdf.worker.js';

        //
        // Asynchronous download PDF
        //
        let currPage = 1;
        let thePDF = null;
        let numPages = null;
        var loadingTask = pdfjsLib.getDocument(url);
        loadingTask.promise.then(function(pdf) {
          //
          // Fetch the first page
          //
          thePDF = pdf;
          numPages = pdf.numPages;
          pdf.getPage(1).then(handlePages);
        });

        function handlePages(page){
          const scale = 1.5;
            const viewport = page.getViewport({ scale: scale, });
            console.log(viewport);
            //
            // Prepare canvas using PDF page dimensions
            //
            var canvas = document.createElement( "canvas" );
            canvas.style.display = "block";
            var context = canvas.getContext('2d');
            canvas.height = viewport.height;
            canvas.width = viewport.width;

            //
            // Render PDF page into canvas context
            //
            var renderContext = {
              canvasContext: context,
              viewport: viewport,
            };
            page.render(renderContext);
            document.body.appendChild( canvas );
            currPage++;
            if ( thePDF !== null && currPage <= numPages )
            {
                thePDF.getPage( currPage ).then( handlePages );
            }
        }
    </script>
  </body>
</html>