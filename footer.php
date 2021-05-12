    <footer>
      <section class="split">
        <div>
          <section>
            <h4>@Rossicocina</h4>
            <?php wp_nav_menu( array('menu' => '', 'theme_location' => 'rossicocina', 'fallback_cb' => false, 'container' => false, 'items_wrap' => '<ul>%3$s</ul>' ) ); ?>
          </section>
          <section>
            <h4>Recetas & Tips</h4>
            <?php wp_nav_menu( array('menu' => '', 'theme_location' => 'tips', 'fallback_cb' => false, 'container' => false, 'items_wrap' => '<ul>%3$s</ul>' ) ); ?>
          </section>
          <section class="split-column">
            <div>
              <h4>Podcast</h4>
              <ul>
              <?php if( get_option('spotify') ): ?>
                <li><a target="_blank" href="<?php echo get_option('spotify'); ?>">Spotify</a></li>
              <?php endif; ?>
              <?php if( get_option('apple') ): ?>
                <li><a target="_blank" href="<?php echo get_option('apple'); ?>">Apple Podcasts</a></li>
              <?php endif; ?>
              <?php if( get_option('google') ): ?>
                <li><a target="_blank" href="<?php echo get_option('google'); ?>">Google Podcasts</a></li>
              <?php endif; ?>
              <?php if( get_option('anchor') ): ?>
                <li><a target="_blank" href="<?php echo get_option('anchor'); ?>">Anchor.fm</a></li>
              <?php endif; ?>
              </ul>
            </div>
           <!--<div>
              <h4>Scones</h4>
              <?php wp_nav_menu( array('menu' => '', 'theme_location' => 'product-showcase', 'fallback_cb' => false, 'container' => false, 'items_wrap' => '<ul>%3$s</ul>' ) ); ?>
            </div>-->
          </section>
        </div>
        <div>
          <object type="image/svg+xml" data="<?php echo get_template_directory_uri(); ?>/assets/logo-white.svg" class="logo">
            RossiCocina Logo
          </object>
          <ul>
            <?php if( get_option('fb_username') ): ?>
            <li>
              <a target="_blank" href="https://facebook.com/<?php echo get_option('fb_username'); ?>/">
                <svg width="48" height="48" viewBox="0 0 48 48" role="img" aria-label="[title]">
                  <title>Facebook Logo</title>
                  <path d="M48 24C48 10.7452 37.2548 0 24 0C10.7452 0 0 10.7452 0 24C0 35.9789 8.77641 45.908 20.25 47.7084V30.9375H14.1562V24H20.25V18.7125C20.25 12.6975 23.8331 9.375 29.3152 9.375C31.9402 9.375 34.6875 9.84375 34.6875 9.84375V15.75H31.6613C28.68 15.75 27.75 17.6002 27.75 19.5V24H34.4062L33.3422 30.9375H27.75V47.7084C39.2236 45.908 48 35.9789 48 24Z" fill="white"/>
                </svg>
              </a>
            </li>
            <?php endif; ?>
            <?php if( get_option('tw_username') ): ?>
            <li>
              <a target="_blank" href="https://twitter.com/<?php echo get_option('tw_username'); ?>/">
                <svg width="48" height="40" viewBox="0 0 48 40" role="img" aria-label="[title]">
                  <title>Twitter Logo</title>
                  <path d="M15.1003 39.5C33.2091 39.5 43.1166 24.4934 43.1166 11.4837C43.1166 11.0618 43.1072 10.6306 43.0884 10.2087C45.0157 8.81492 46.679 7.08851 48 5.1106C46.205 5.9092 44.2993 6.43076 42.3478 6.65747C44.4026 5.42582 45.9411 3.49094 46.6781 1.21153C44.7451 2.35711 42.6312 3.16522 40.4269 3.60122C38.9417 2.02312 36.978 0.978233 34.8394 0.628102C32.7008 0.277971 30.5064 0.642101 28.5955 1.66419C26.6846 2.68629 25.1636 4.30941 24.2677 6.28262C23.3718 8.25584 23.1509 10.4692 23.6391 12.5806C19.725 12.3842 15.8959 11.3674 12.4 9.5962C8.90405 7.82499 5.81939 5.33887 3.34594 2.29903C2.0888 4.46649 1.70411 7.03129 2.27006 9.47218C2.83601 11.9131 4.31013 14.0469 6.39281 15.44C4.82926 15.3903 3.29995 14.9694 1.93125 14.2118V14.3337C1.92985 16.6083 2.7162 18.8132 4.15662 20.5735C5.59704 22.3339 7.60265 23.5411 9.8325 23.99C8.38411 24.3863 6.86396 24.444 5.38969 24.1587C6.01891 26.1149 7.24315 27.8258 8.89154 29.0527C10.5399 30.2796 12.5302 30.9612 14.5847 31.0025C11.0968 33.7422 6.78835 35.2283 2.35313 35.2212C1.56657 35.22 0.780798 35.1718 0 35.0768C4.50571 37.9675 9.74706 39.5028 15.1003 39.5Z" fill="white"/>
                </svg>
              </a>
            </li>
            <?php endif; ?>
            <?php if( get_option('ig_username') ): ?>
            <li>
              <a target="_blank" href="https://instagram.com/<?php echo get_option('ig_username'); ?>/">
                <svg width="48" height="48" viewBox="0 0 48 48" role="img" aria-label="[title]">
                  <title>Instagram Logo</title>
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M24 4.3219C30.4125 4.3219 31.1719 4.34998 33.6937 4.46252C36.0375 4.56567 37.3031 4.95935 38.1469 5.28748C39.2625 5.71875 40.0687 6.24377 40.9031 7.07812C41.7469 7.92188 42.2625 8.71875 42.6937 9.83435C43.0219 10.6781 43.4156 11.9531 43.5187 14.2875C43.6312 16.8187 43.6594 17.5781 43.6594 23.9812C43.6594 30.3938 43.6312 31.1531 43.5187 33.675C43.4156 36.0188 43.0219 37.2844 42.6937 38.1282C42.2625 39.2438 41.7375 40.05 40.9031 40.8844C40.0594 41.7281 39.2625 42.2438 38.1469 42.675C37.3031 43.0032 36.0281 43.3969 33.6937 43.5C31.1625 43.6125 30.4031 43.6406 24 43.6406C17.5875 43.6406 16.8281 43.6125 14.3063 43.5C11.9625 43.3969 10.6969 43.0032 9.85315 42.675C8.73749 42.2438 7.93127 41.7188 7.09686 40.8844C6.25311 40.0406 5.73749 39.2438 5.30627 38.1282C4.97815 37.2844 4.58435 36.0094 4.48126 33.675C4.36877 31.1438 4.34064 30.3844 4.34064 23.9812C4.34064 17.5687 4.36877 16.8093 4.48126 14.2875C4.58435 11.9437 4.97815 10.6781 5.30627 9.83435C5.73749 8.71875 6.26251 7.91248 7.09686 7.07812C7.94061 6.23438 8.73749 5.71875 9.85315 5.28748C10.6969 4.95935 11.9719 4.56567 14.3063 4.46252C16.8281 4.34998 17.5875 4.3219 24 4.3219ZM24 0C17.4844 0 16.6688 0.0280762 14.1094 0.140625C11.5594 0.253174 9.80627 0.665649 8.28748 1.25623C6.70312 1.875 5.36249 2.69067 4.03125 4.03125C2.69061 5.36255 1.875 6.70312 1.25623 8.27808C0.665649 9.80627 0.253113 11.55 0.140625 14.1C0.0281372 16.6687 0 17.4844 0 24C0 30.5156 0.0281372 31.3313 0.140625 33.8906C0.253113 36.4407 0.665649 38.1937 1.25623 39.7125C1.875 41.2969 2.69061 42.6375 4.03125 43.9688C5.36249 45.3 6.70312 46.125 8.27814 46.7344C9.80627 47.325 11.55 47.7375 14.1 47.85C16.6594 47.9625 17.475 47.9906 23.9906 47.9906C30.5062 47.9906 31.3219 47.9625 33.8812 47.85C36.4313 47.7375 38.1844 47.325 39.7031 46.7344C41.2781 46.125 42.6188 45.3 43.95 43.9688C45.2812 42.6375 46.1063 41.2969 46.7156 39.7219C47.3063 38.1937 47.7188 36.45 47.8312 33.9C47.9437 31.3406 47.9719 30.525 47.9719 24.0094C47.9719 17.4938 47.9437 16.6781 47.8312 14.1188C47.7188 11.5687 47.3063 9.81567 46.7156 8.29688C46.125 6.70312 45.3094 5.36255 43.9688 4.03125C42.6375 2.69995 41.2969 1.875 39.7219 1.26562C38.1937 0.675049 36.45 0.262451 33.9 0.150024C31.3312 0.0280762 30.5156 0 24 0ZM24 11.6719C17.1937 11.6719 11.6719 17.1937 11.6719 24C11.6719 30.8063 17.1937 36.3281 24 36.3281C30.8063 36.3281 36.3281 30.8063 36.3281 24C36.3281 17.1937 30.8063 11.6719 24 11.6719ZM24 31.9968C19.5844 31.9968 16.0031 28.4156 16.0031 24C16.0031 19.5844 19.5844 16.0032 24 16.0032C28.4156 16.0032 31.9969 19.5844 31.9969 24C31.9969 28.4156 28.4156 31.9968 24 31.9968ZM36.8156 14.0624C38.4 14.0624 39.6937 12.7781 39.6937 11.1843C39.6937 9.59985 38.4 8.30615 36.8156 8.30615C35.2313 8.30615 33.9375 9.59058 33.9375 11.1843C33.9375 12.7687 35.2219 14.0624 36.8156 14.0624Z" fill="white"/>
                </svg>
              </a>
            </li>
            <?php endif; ?>
            <?php if( get_option('yt_username') ): ?>
            <li>
              <a target="_blank" href="https://youtube.com/<?php echo get_option('yt_username'); ?>/">
                <title>Youtube Logo</title>
                <svg width="48" height="34" viewBox="0 0 48 34" role="img" aria-label="[title]">
                  <path d="M47.5219 7.28438C47.5219 7.28438 47.0531 3.975 45.6094 2.52188C43.7812 0.609375 41.7375 0.6 40.8 0.4875C34.0875 -2.68221e-07 24.0094 0 24.0094 0H23.9906C23.9906 0 13.9125 -2.68221e-07 7.2 0.4875C6.2625 0.6 4.21875 0.609375 2.39062 2.52188C0.946875 3.975 0.4875 7.28438 0.4875 7.28438C0.4875 7.28438 0 11.175 0 15.0563V18.6937C0 22.575 0.478125 26.4656 0.478125 26.4656C0.478125 26.4656 0.946875 29.775 2.38125 31.2281C4.20937 33.1406 6.60938 33.075 7.67813 33.2812C11.5219 33.6469 24 33.7594 24 33.7594C24 33.7594 34.0875 33.7406 40.8 33.2625C41.7375 33.15 43.7812 33.1406 45.6094 31.2281C47.0531 29.775 47.5219 26.4656 47.5219 26.4656C47.5219 26.4656 48 22.5844 48 18.6937V15.0563C48 11.175 47.5219 7.28438 47.5219 7.28438ZM19.0406 23.1094V9.61875L32.0062 16.3875L19.0406 23.1094Z" fill="white"/>
                </svg>
              </a>
            </li>
            <?php endif; ?>
            <?php if( get_option('spotify') ): ?>
            <li>
              <a target="_blank" href="<?php echo get_option('spotify'); ?>">
                <svg width="49" height="49" viewBox="0 0 49 49" role="img" aria-label="[title]">
                  <title>Spotify Logo</title>
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M24.5 0C18.0022 0 11.7705 2.58124 7.17589 7.17588C2.58124 11.7705 0 18.0022 0 24.5C0 30.9978 2.58124 37.2295 7.17589 41.8241C11.7705 46.4188 18.0022 49 24.5 49C30.9978 49 37.2295 46.4188 41.8241 41.8241C46.4188 37.2295 49 30.9978 49 24.5C49 18.0022 46.4188 11.7705 41.8241 7.17588C37.2295 2.58124 30.9978 0 24.5 0ZM35.7372 35.3362C35.6328 35.5078 35.4956 35.6571 35.3334 35.7755C35.1712 35.8939 34.9873 35.9792 34.7921 36.0264C34.5968 36.0735 34.3943 36.0817 34.1959 36.0504C33.9975 36.0191 33.8073 35.9489 33.6361 35.8439C27.8821 32.3291 20.6441 31.535 12.1146 33.4825C11.9192 33.5271 11.7169 33.5328 11.5193 33.4992C11.3217 33.4657 11.1327 33.3935 10.9629 33.2869C10.7932 33.1803 10.6462 33.0413 10.5302 32.8778C10.4142 32.7144 10.3315 32.5297 10.2869 32.3343C10.2423 32.1389 10.2366 31.9366 10.2701 31.739C10.3037 31.5414 10.3758 31.3523 10.4824 31.1826C10.5891 31.0129 10.7281 30.8658 10.8915 30.7498C11.055 30.6338 11.2397 30.5512 11.4351 30.5065C20.7664 28.3716 28.7725 29.2906 35.2295 33.2377C35.9481 33.6777 36.1746 34.6176 35.7372 35.3362ZM38.7314 28.6658C38.4664 29.0968 38.0414 29.4052 37.5494 29.5233C37.0574 29.6414 36.5387 29.5596 36.1069 29.2959C29.5224 25.2472 19.4828 24.0756 11.6928 26.4397C11.2189 26.5521 10.7199 26.4796 10.2975 26.2369C9.8752 25.9941 9.56133 25.5995 9.4199 25.1333C9.27846 24.6672 9.32012 24.1647 9.53636 23.7282C9.7526 23.2917 10.1272 22.9541 10.5837 22.7842C19.4828 20.0843 30.543 21.3939 38.1039 26.0387C38.318 26.1699 38.5042 26.3421 38.6518 26.5453C38.7994 26.7484 38.9054 26.9787 38.964 27.223C39.0225 27.4672 39.0323 27.7206 38.9928 27.9686C38.9533 28.2166 38.8654 28.4544 38.734 28.6684L38.7314 28.6658ZM38.9943 21.7193C31.095 17.0302 18.0665 16.598 10.529 18.8892C10.2398 18.9815 9.93505 19.0153 9.63259 18.9888C9.33013 18.9623 9.03596 18.8759 8.76718 18.7347C8.49839 18.5936 8.26035 18.4003 8.06688 18.1663C7.87342 17.9323 7.7284 17.6622 7.64024 17.3717C7.55208 17.0812 7.52254 16.776 7.55334 16.474C7.58415 16.1719 7.67468 15.879 7.81967 15.6122C7.96467 15.3455 8.16123 15.1102 8.39795 14.9201C8.63466 14.7299 8.90681 14.5888 9.19856 14.5047C17.8504 11.8751 32.2379 12.3854 41.3272 17.7801C41.8499 18.0901 42.228 18.5951 42.3784 19.184C42.5288 19.7728 42.4391 20.3973 42.1291 20.92C41.819 21.4428 41.314 21.8209 40.7252 21.9713C40.1363 22.1217 39.5118 22.032 38.9891 21.7219" fill="white"/>
                </svg>
              </a>
            </li>
            <?php endif; ?>
            <?php if( get_option('apple') ): ?>
            <li>
              <a target="_blank" href="<?php echo get_option('apple'); ?>">
                <svg width="41" height="48" viewBox="0 0 41 48" role="img" aria-label="[title]">
                  <title>Apple Logo</title>
                  <path d="M39.5839 37.4071C38.858 39.0841 37.9988 40.6278 37.0033 42.047C35.6463 43.9817 34.5352 45.321 33.6789 46.0647C32.3516 47.2854 30.9294 47.9105 29.4065 47.9461C28.3132 47.9461 26.9947 47.635 25.4599 47.0039C23.9201 46.3758 22.5051 46.0647 21.2112 46.0647C19.8542 46.0647 18.3988 46.3758 16.8421 47.0039C15.2831 47.635 14.0271 47.9639 13.0668 47.9964C11.6064 48.0587 10.1508 47.4157 8.69779 46.0647C7.77042 45.2558 6.61046 43.8692 5.22087 41.9048C3.72995 39.8071 2.50422 37.3745 1.54395 34.6013C0.515539 31.6058 0 28.7052 0 25.897C0 22.6802 0.695089 19.9057 2.08734 17.5808C3.18153 15.7133 4.63718 14.2401 6.45905 13.1587C8.28092 12.0772 10.2495 11.5261 12.3694 11.4909C13.5293 11.4909 15.0505 11.8497 16.9408 12.5548C18.8258 13.2624 20.0361 13.6212 20.5667 13.6212C20.9635 13.6212 22.308 13.2016 24.5874 12.3652C26.7428 11.5895 28.562 11.2684 30.0524 11.3949C34.0908 11.7208 37.1247 13.3127 39.1425 16.1808C35.5307 18.3692 33.7441 21.4343 33.7797 25.3663C33.8123 28.429 34.9233 30.9777 37.107 33.0013C38.0966 33.9406 39.2017 34.6665 40.4313 35.182C40.1646 35.9553 39.8832 36.696 39.5839 37.4071ZM30.322 0.960823C30.322 3.36137 29.445 5.60276 27.6969 7.67736C25.5873 10.1437 23.0357 11.5688 20.2687 11.3439C20.2334 11.0559 20.213 10.7528 20.213 10.4343C20.213 8.12979 21.2162 5.6635 22.9978 3.64696C23.8872 2.62596 25.0185 1.77701 26.3903 1.09978C27.7591 0.43266 29.0539 0.0637274 30.2716 0.000549316C30.3072 0.321465 30.322 0.642401 30.322 0.960792V0.960823Z" fill="white"/>
                </svg>
              </a>
            </li>
            <?php endif; ?>
          </ul>
          <small>2019 - <?php echo date("Y"); ?></small>
          <small>Todos los derechos reservados.</small>
          <small><a title="<? bloginfo('name'); ?>" href="<?php echo get_site_url(); ?>">rossicocina.com</a></small>
        </div>
      </section>
    </footer>
    <?php wp_footer(); ?>
  </body>
</html>