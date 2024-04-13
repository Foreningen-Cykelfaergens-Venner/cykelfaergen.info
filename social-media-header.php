<?php
    $p = "https://";
	$server_name = $p."".$_SERVER['HTTP_HOST'];
?>
<script src="/js/sharing.js"></script>
<article class="social-media-sharer-container">
    <section class="sms-content">
        <ul>
            <li><a href="javascript:void(0);" title="Share news on Facebook" aria-label="Share on Facebook" alt="Share on Facebook" onclick="sharing('https://www.facebook.com/sharer/sharer.php?title=<?= $main_title?>:+<?= $description?>&u=<?= urlencode($server_name .''. $_SERVER["REQUEST_URI"])?>', 'Facebook: <?= $main_title?>');" class="sms-content-anchor fb"><i class="fab fa-facebook-f"></i></a></li>
            <li><a href="javascript:void(0);" title="Share news on LinkedIn" aria-label="Share on LinkedIn" alt="Share on LinkedIn" onclick='sharing("http://www.linkedin.com/sharing/share-offsite/?url=<?= urlencode($server_name .''. $_SERVER["REQUEST_URI"])?>&title=<?= $main_title?>:+<?= $description?>", "LinkedIn: <?= $main_title?>")' class="sms-content-anchor in"><i class="fab fa-linkedin-in"></i></a></li>
            <li><a href="javascript:void(0)" onclick='sharing("http://www.pinterest.com/pin/create/button/?url=<?= urlencode($server_name ."". $_SERVER["REQUEST_URI"])?>", "Email: <?= $main_title?>")' aria-label="Pin it on Pintrest" title="Pin it on Pintrest" alt="Pin it on Pintrest" class="sms-content-anchor in"><i class="fa-brands fa-pinterest"></i></a></li>
            <li><a href="javascript:void(0)" onclick='sharing("https://api.whatsapp.com/send?text=<?= urlencode($server_name ."". $_SERVER["REQUEST_URI"])?>", "Email: <?= $main_title?>")' aria-label="Share it via Whatsapp" title="Share it via Whatsapp" alt="Share it via Whatsapp" class="sms-content-anchor in"><i class="fa-brands fa-whatsapp"></i></a></li>
            <li><a href="javascript:void(0)" onclick='sharingEmail("mailto:?subject=<?= $main_title?>&body=<?= $main_title?>: <?= $description?>%0D%0ALæs hele historien her:%0D%0A<?= urlencode($server_name ."". $_SERVER["REQUEST_URI"])?>", "Email: <?= $main_title?>")' aria-label="Share via Email" title="Share via Email" alt="Share via Email" class="sms-content-anchor"><i class="fas fa-envelope"></i></a></li>
        </ul>
    </section>
</article>