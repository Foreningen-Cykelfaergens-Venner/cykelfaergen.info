<article class="tdfbanner">
    <section class="tdfbanner__content grid">
        <section class="tdfbanner__LeftSide">
            <h1 class="tdfbanner-title tdf-font">Le Tour de Brunsnæs 2022</h1>
            <h2 class="tdfbanner-title2 tdf-font">25. Juni - 3. Juli</h2>
            <p class="tdf-font">Die Fahrradfähre an der Flensburger Förde unterstützt die Tour de France in Sonderburg mit einem wöchentlichen Sonderfahrplan. So werden wir zwischen dem 26. Juni und 3. Juli eine Woche lang mit der Fahrradfähre ganztägig zwischen Brunsnæs und Langballigau verkehren.</p>
            <a href="#time" class="tdf-cta tdf-font">Sonderfahrplan</a>
            <p class="tdf-font">Ab dem 4. Juli gilt dann unser regulärer <a href="/#time">Sommerfahrplan</a>.</p>
        </section>
        <section class="tdfbanner__RightSide">
            <section class="TDFcounterContainer">
                <h3 class="tdf-font tdf-counter">Unsere Tour beginnt in:</h3>
                <h2 class="tdfCounter">
                    <span class="tdfCounter__item">
                        <span class="tdfCounter__item-number daysItem">--</span>
                        <span class="tdfCounter__item-type">Tagen</span>
                    </span>
                    <span class="tdfCounter__item">
                        <span class="tdfCounter__item-number hoursItem">--</span>
                        <span class="tdfCounter__item-type">Stunden</span>
                    </span>
                    <span class="tdfCounter__item">
                        <span class="tdfCounter__item-number minsItem">--</span>
                        <span class="tdfCounter__item-type">Minuten</span>
                    </span>
                    <span class="tdfCounter__item">
                        <span class="tdfCounter__item-number secItem">--</span>
                        <span class="tdfCounter__item-type">Sekunden</span>
                    </span>
                </h2>
            </section>
        </section>
        
    </section>
    <header class="tdfbanner__footer --header"></header>
    <footer class="tdfbanner__footer"></footer>
</article>
<section class="content grid-75x25">
    <section>
        <article class="tdf-content" id="time">
            <h2 class="tdf-font">Sonderfahrplan</h2>
            <section class="first">
                <p>Abfahrten von Brunsnæs nach Langballigau und zurück.</p>
                <section class="second">
                    <table class="sticky-left tdfTabel">
                        <?  

                            $sql = "SELECT * FROM timetable WHERE special_days = 'tourde' AND active = 1";
                            $query = mysqli_query($db, $sql);
                            $num = mysqli_num_rows($query);

                            $sqls = "SELECT * FROM timetable WHERE special_days = 'tourde' AND active = 1";
                            $querys = mysqli_query($db, $sqls);

                            if($num == 0){
                            echo "<tr><td>Zur Zeit gibt es keine Routen. Wir arbeiten daran!</td></tr>";
                            }
                            $data = $querys->fetch_assoc();
                            if($data["special_days"] == "tourde"){
                                echo "<tr>
                                <th colspan='10'>Gültig an allen Tagen ausser freitags (26. Juni - 3. Juli)</th>
                            </tr>";
                                }else{
                                    echo "<tr>
                                <th colspan='10'>Alle dage UNDTAGEN Fredag</th>
                            </tr>";
                            }
                    
                            while($row = $query->fetch_assoc()){
                                $dep = $row["dep/arrive"];
                                $dept = json_decode($row["dep_time"], true);
                        ?> 
                            <tr>
                                <td class="headcol"><?= mb_convert_encoding($row["dep_place"], "UTF-8" , 'HTML-ENTITIES')?></td>
                                <? if($dep == "dep"){?>
                                    <td class="headcol">Ab:</td>
                                <?}else if($dep == "arr_dep"){?>
                                    <td class="headcol">An/Ab:</td>
                                <?}else{?>
                                    <td class="headcol">An:</td>	
                                <?}?>
                        <?
                                if(is_array($dept)){
                                foreach($dept as $af=>$key){
                                ?>
                                    <td><?= $key?></td>
                                <?
                                }
                                }
                                ?>
                            </tr>  
                        <?
                            }
                        ?>
                    </table>
                </section>
            </section>
            <section class="first">
                <h2 class="tdf-font">Routenvorschlag mit dem Fahrrad</h2>
                <p>Nehme das Fahrrad und mache eine schöne Radtour von Brunsnæs nach Sonderburg (ca.13 km). Entdecke die grünste Zielstadt der Welt - eine gemütliche Stadt in Festtagsstimmung, ganz in Gelb gekleidet.</p>
                <iframe src="https://www.google.com/maps/embed?pb=!1m26!1m12!1m3!1d43949.357234435476!2d9.682528242518284!3d54.88231792993966!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m11!3e1!4m3!3m2!1d54.8668021!2d9.636265!4m5!1s0x47b337c2e0ee44ed%3A0x49a0979574e7aeeb!2s6400%20S%C3%B8nderborg!3m2!1d54.913810999999995!2d9.792178!5e0!3m2!1sen!2sdk!4v1654703942829!5m2!1sen!2sdk" width="800" height="600" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </section>
            <!-- <section class="first">
                <h2 class="tdf-font">Oplev</h2>
                <section class="grid grid-3">
                    <article class="tdfCard">
                        <img src="https://mikkelkvt.dk/wp-content/uploads/2020/12/2020-okt-levende-teglvaerk-teglvaerket.jpeg" alt="Cathrines minde" class="tdfCard__image">
                        <div class="tdfCard__overlay"></div>
                        <section class="tdfCard__content">
                            <h2 class="tdf-font">Cathrines Minde</h2>
                            <p></p>
                            <a href="discover/cathrines-minde" class="tdf-cta tdf-font">Læs mere</a>
                        </section>
                    </article>
                    <article class="tdfCard">
                        <img src="https://www.campingplatz-langballigau.de/fileadmin/_processed_/1/f/csm_Campingplatz_Langballigau_7794086059.jpg" alt="Campingplads Langballigau" class="tdfCard__image">
                        <div class="tdfCard__overlay"></div>
                        <section class="tdfCard__content">
                            <h2 class="tdf-font">Langballigau</h2>
                            <p></p>
                            <a href="discover/langballigau" class="tdf-cta tdf-font">Læs mere</a>
                        </section>
                    </article>
                    <article class="tdfCard">
                        <img src="http://haapi.historiskatlas.dk/image/105714.jpg?key=00e763e5df5f47e3a4a64aea3a18fdaa" alt="Broager Kirke" class="tdfCard__image">
                        <div class="tdfCard__overlay"></div>
                        <section class="tdfCard__content">
                            <h2 class="tdf-font">Broager Kirke</h2>
                            <p></p>
                            <a href="discover/broager-kirke" class="tdf-cta tdf-font">Læs mere</a>
                        </section>
                    </article>
                </section>
            </section> -->
        </article>
    </section>
    <aside>
        <h2 class="tdf-font">Allgemeine Information</h2>
        <article class="infoSideBanner">
            <section class="infoSideBanner__content">
                <h2 class="tdf-font">Zeitraum für die Tour de Brunsnæs</h2>
                <p>25. Juni - 3. Juli</p>
                <p>Hinweis: Am Sonntag sind Abfahrten von Brunsnæs auch um 17:30 Uhr und 18:30 Uhr möglich! Reservation unter: <a href='tel:+4520256462'>+45 20 25 64 62</a></p>
                <p>Freitags fährt die Fähre Richtung Flensburg. Fahrzeiten freitags siehe regulärer <a href="/#time">Sommerfahrplan</a>.</p>
            </section>
        </article>
    </aside>
</section>