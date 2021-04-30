    <footer>
      <section class="split">
        <div>
          <section>
            <h4>@Rossicocina</h4>
            <?php wp_nav_menu( array('menu' => '', 'theme_location' => 'rossicocina', 'fallback_cb' => false, 'container' => false, 'items_wrap' => '<ul>%3$s</ul>' ) ); ?>
          </section>
          <section>
            <h4>Recetas & Tips</h4>
            <?php wp_nav_menu( array('menu' => '', 'theme_location' => 'recetas', 'fallback_cb' => false, 'container' => false, 'items_wrap' => '<ul>%3$s</ul>' ) ); ?>
          </section>
          <section class="split-column">
            <div>
              <h4>Podcast</h4>
              <?php wp_nav_menu( array('menu' => '', 'theme_location' => 'podcast', 'fallback_cb' => false, 'container' => false, 'items_wrap' => '<ul>%3$s</ul>' ) ); ?>
            </div>
            <div>
              <h4>Scones</h4>
              <?php wp_nav_menu( array('menu' => '', 'theme_location' => 'scones', 'fallback_cb' => false, 'container' => false, 'items_wrap' => '<ul>%3$s</ul>' ) ); ?>
            </div>
          </section>
        </div>
        <div>
          <object type="image/svg+xml" data="assets/logo-white.svg" class="logo">
            no-fallback
          </object>
          <ul>
            <li>
              <a href="#">
                <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M48 24C48 10.7452 37.2548 0 24 0C10.7452 0 0 10.7452 0 24C0 35.9789 8.77641 45.908 20.25 47.7084V30.9375H14.1562V24H20.25V18.7125C20.25 12.6975 23.8331 9.375 29.3152 9.375C31.9402 9.375 34.6875 9.84375 34.6875 9.84375V15.75H31.6613C28.68 15.75 27.75 17.6002 27.75 19.5V24H34.4062L33.3422 30.9375H27.75V47.7084C39.2236 45.908 48 35.9789 48 24Z" fill="white"/>
                </svg>
              </a>
            </li>
            <li>
              <a href="#">
                <svg width="48" height="40" viewBox="0 0 48 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M15.1003 39.5C33.2091 39.5 43.1166 24.4934 43.1166 11.4837C43.1166 11.0618 43.1072 10.6306 43.0884 10.2087C45.0157 8.81492 46.679 7.08851 48 5.1106C46.205 5.9092 44.2993 6.43076 42.3478 6.65747C44.4026 5.42582 45.9411 3.49094 46.6781 1.21153C44.7451 2.35711 42.6312 3.16522 40.4269 3.60122C38.9417 2.02312 36.978 0.978233 34.8394 0.628102C32.7008 0.277971 30.5064 0.642101 28.5955 1.66419C26.6846 2.68629 25.1636 4.30941 24.2677 6.28262C23.3718 8.25584 23.1509 10.4692 23.6391 12.5806C19.725 12.3842 15.8959 11.3674 12.4 9.5962C8.90405 7.82499 5.81939 5.33887 3.34594 2.29903C2.0888 4.46649 1.70411 7.03129 2.27006 9.47218C2.83601 11.9131 4.31013 14.0469 6.39281 15.44C4.82926 15.3903 3.29995 14.9694 1.93125 14.2118V14.3337C1.92985 16.6083 2.7162 18.8132 4.15662 20.5735C5.59704 22.3339 7.60265 23.5411 9.8325 23.99C8.38411 24.3863 6.86396 24.444 5.38969 24.1587C6.01891 26.1149 7.24315 27.8258 8.89154 29.0527C10.5399 30.2796 12.5302 30.9612 14.5847 31.0025C11.0968 33.7422 6.78835 35.2283 2.35313 35.2212C1.56657 35.22 0.780798 35.1718 0 35.0768C4.50571 37.9675 9.74706 39.5028 15.1003 39.5Z" fill="white"/>
                </svg>
              </a>
            </li>
            <li>
              <a href="#">
                <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M24 4.3219C30.4125 4.3219 31.1719 4.34998 33.6937 4.46252C36.0375 4.56567 37.3031 4.95935 38.1469 5.28748C39.2625 5.71875 40.0687 6.24377 40.9031 7.07812C41.7469 7.92188 42.2625 8.71875 42.6937 9.83435C43.0219 10.6781 43.4156 11.9531 43.5187 14.2875C43.6312 16.8187 43.6594 17.5781 43.6594 23.9812C43.6594 30.3938 43.6312 31.1531 43.5187 33.675C43.4156 36.0188 43.0219 37.2844 42.6937 38.1282C42.2625 39.2438 41.7375 40.05 40.9031 40.8844C40.0594 41.7281 39.2625 42.2438 38.1469 42.675C37.3031 43.0032 36.0281 43.3969 33.6937 43.5C31.1625 43.6125 30.4031 43.6406 24 43.6406C17.5875 43.6406 16.8281 43.6125 14.3063 43.5C11.9625 43.3969 10.6969 43.0032 9.85315 42.675C8.73749 42.2438 7.93127 41.7188 7.09686 40.8844C6.25311 40.0406 5.73749 39.2438 5.30627 38.1282C4.97815 37.2844 4.58435 36.0094 4.48126 33.675C4.36877 31.1438 4.34064 30.3844 4.34064 23.9812C4.34064 17.5687 4.36877 16.8093 4.48126 14.2875C4.58435 11.9437 4.97815 10.6781 5.30627 9.83435C5.73749 8.71875 6.26251 7.91248 7.09686 7.07812C7.94061 6.23438 8.73749 5.71875 9.85315 5.28748C10.6969 4.95935 11.9719 4.56567 14.3063 4.46252C16.8281 4.34998 17.5875 4.3219 24 4.3219ZM24 0C17.4844 0 16.6688 0.0280762 14.1094 0.140625C11.5594 0.253174 9.80627 0.665649 8.28748 1.25623C6.70312 1.875 5.36249 2.69067 4.03125 4.03125C2.69061 5.36255 1.875 6.70312 1.25623 8.27808C0.665649 9.80627 0.253113 11.55 0.140625 14.1C0.0281372 16.6687 0 17.4844 0 24C0 30.5156 0.0281372 31.3313 0.140625 33.8906C0.253113 36.4407 0.665649 38.1937 1.25623 39.7125C1.875 41.2969 2.69061 42.6375 4.03125 43.9688C5.36249 45.3 6.70312 46.125 8.27814 46.7344C9.80627 47.325 11.55 47.7375 14.1 47.85C16.6594 47.9625 17.475 47.9906 23.9906 47.9906C30.5062 47.9906 31.3219 47.9625 33.8812 47.85C36.4313 47.7375 38.1844 47.325 39.7031 46.7344C41.2781 46.125 42.6188 45.3 43.95 43.9688C45.2812 42.6375 46.1063 41.2969 46.7156 39.7219C47.3063 38.1937 47.7188 36.45 47.8312 33.9C47.9437 31.3406 47.9719 30.525 47.9719 24.0094C47.9719 17.4938 47.9437 16.6781 47.8312 14.1188C47.7188 11.5687 47.3063 9.81567 46.7156 8.29688C46.125 6.70312 45.3094 5.36255 43.9688 4.03125C42.6375 2.69995 41.2969 1.875 39.7219 1.26562C38.1937 0.675049 36.45 0.262451 33.9 0.150024C31.3312 0.0280762 30.5156 0 24 0ZM24 11.6719C17.1937 11.6719 11.6719 17.1937 11.6719 24C11.6719 30.8063 17.1937 36.3281 24 36.3281C30.8063 36.3281 36.3281 30.8063 36.3281 24C36.3281 17.1937 30.8063 11.6719 24 11.6719ZM24 31.9968C19.5844 31.9968 16.0031 28.4156 16.0031 24C16.0031 19.5844 19.5844 16.0032 24 16.0032C28.4156 16.0032 31.9969 19.5844 31.9969 24C31.9969 28.4156 28.4156 31.9968 24 31.9968ZM36.8156 14.0624C38.4 14.0624 39.6937 12.7781 39.6937 11.1843C39.6937 9.59985 38.4 8.30615 36.8156 8.30615C35.2313 8.30615 33.9375 9.59058 33.9375 11.1843C33.9375 12.7687 35.2219 14.0624 36.8156 14.0624Z" fill="white"/>
                </svg>
              </a>
            </li>
            <li>
              <a href="#">
                <svg width="48" height="34" viewBox="0 0 48 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M47.5219 7.28438C47.5219 7.28438 47.0531 3.975 45.6094 2.52188C43.7812 0.609375 41.7375 0.6 40.8 0.4875C34.0875 -2.68221e-07 24.0094 0 24.0094 0H23.9906C23.9906 0 13.9125 -2.68221e-07 7.2 0.4875C6.2625 0.6 4.21875 0.609375 2.39062 2.52188C0.946875 3.975 0.4875 7.28438 0.4875 7.28438C0.4875 7.28438 0 11.175 0 15.0563V18.6937C0 22.575 0.478125 26.4656 0.478125 26.4656C0.478125 26.4656 0.946875 29.775 2.38125 31.2281C4.20937 33.1406 6.60938 33.075 7.67813 33.2812C11.5219 33.6469 24 33.7594 24 33.7594C24 33.7594 34.0875 33.7406 40.8 33.2625C41.7375 33.15 43.7812 33.1406 45.6094 31.2281C47.0531 29.775 47.5219 26.4656 47.5219 26.4656C47.5219 26.4656 48 22.5844 48 18.6937V15.0563C48 11.175 47.5219 7.28438 47.5219 7.28438ZM19.0406 23.1094V9.61875L32.0062 16.3875L19.0406 23.1094Z" fill="white"/>
                </svg>
              </a>
            </li>
          </ul>
          <small>2021 — Todos los derechos reservados.</small>
          <small>rossicocina.com</small>
        </div>
      </section>
    </footer>
    <?php wp_footer(); ?>
  </body>
</html>