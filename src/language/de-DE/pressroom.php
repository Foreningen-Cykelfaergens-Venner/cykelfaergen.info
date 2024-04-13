<div class="main-container">
    <div class="content">
        <main class="left-side">
            <h1>Pressebereich</h1>
            <form class="search" action="/pressroom/search" method="get">
                <label for="">Suche Pressemitteilungen</label>
                <select class="search__select" name="year">
                    <option selected disabled>Wähle das Jahr</option>
                    <option value="<?= date("Y")?>"><?= date("Y")?></option>
                    <option value="2022">2022</option>
                    <option value="2021">2021</option>
                    <option value="2020">2020</option>
                </select>
            </form>
          	<div class="l_news-c">
          		<div class="category">
                	<div class="up group">
                      	<svg xmlns:svg="http://www.w3.org/2000/svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" id="i-arrow-right" version="1.0" width="1em" height="1em" viewBox="0 0 128 128" xml:space="preserve">
                        <g><path d="M59.6 0h8v40h-8V0z" fill-opacity="1" fill="#787878"/><path d="M59.6 0h8v40h-8V0z" fill-opacity="0.2" transform="rotate(30 64 64)" fill="#787878"/>
                          <path d="M59.6 0h8v40h-8V0z" fill-opacity="0.2" transform="rotate(60 64 64)" fill="#787878"/><path d="M59.6 0h8v40h-8V0z" fill-opacity="0.2" transform="rotate(90 64 64)" fill="#787878"/>
                          <path d="M59.6 0h8v40h-8V0z" fill-opacity="0.2" transform="rotate(120 64 64)" fill="#787878"/><path d="M59.6 0h8v40h-8V0z" fill-opacity="0.3" transform="rotate(150 64 64)" fill="#787878"/>
                          <path d="M59.6 0h8v40h-8V0z" fill-opacity="0.4" transform="rotate(180 64 64)" fill="#787878"/><path d="M59.6 0h8v40h-8V0z" fill-opacity="0.5" transform="rotate(210 64 64)" fill="#787878"/>
                          <path d="M59.6 0h8v40h-8V0z" fill-opacity="0.6" transform="rotate(240 64 64)" fill="#787878"/><path d="M59.6 0h8v40h-8V0z" fill-opacity="0.7" transform="rotate(270 64 64)" fill="#787878"/>
                          <path d="M59.6 0h8v40h-8V0z" fill-opacity="0.8" transform="rotate(300 64 64)" fill="#787878"/><path d="M59.6 0h8v40h-8V0z" fill-opacity="0.9" transform="rotate(330 64 64)" fill="#787878"/>
                          <animateTransform attributeName="transform" type="rotate" values="0 64 64;30 64 64;60 64 64;90 64 64;120 64 64;150 64 64;180 64 64;210 64 64;240 64 64;270 64 64;300 64 64;330 64 64" calcMode="discrete" dur="1080ms" repeatCount="indefinite"/></g>
                        </svg> Getting the latest news please wait...
                  	</div>
              	</div>
          	</div>
          	<div style="clear: both;"></div>
        </main>
        <div class="sidebar">
            <h2>Pressekontakt</h2>
            <div class="den">
                <p>Dänemark<br>
                    Gerhard Jacobsen<br>
                    Tel.: +45 30 49 74 81<br>
                    Email: press.dk@cykelfaergen.info
                </p>
            </div>
            <div class="germ">
                <p>Deutschland<br>
                    Dagmar Trepins<br>
                    Email: press.de@cykelfaergen.info
                </p>
            </div>
        </div>
        <div class="clear"></div>
    </div>
</div>
<script src="js/getnews.js"></script>