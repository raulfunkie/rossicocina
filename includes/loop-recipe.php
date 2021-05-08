    <section class="recipe-details">
      <div class="recipe-meta">
        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
          <h1 itemprop="name"><?php the_title(); ?></h1>
        </a>
          <div class="post-meta-details">
            <ul>
              <?php if( get_field('total_time') ): ?>
              <li>
                <h5>Tiempo</h5>
                <time itemprop="cookTime"><?php the_field('total_time'); ?> min.</time>
              </li>
              <?php endif; ?>
              <?php if( $rcf['prep_time'] ): ?>
              <li>
                <h5>Preparación</h5>
                <time itemprop="prepTime"><?php echo $rcf['prep_time']; ?> min.</time>
              </li>
              <?php endif; ?>
              <?php if( $rcf['recipe_type'] ): ?>
              <li>
                <h5>Tipo</h5>
                <p><?php the_field('recipe_type'); ?></p>
              </li>
              <?php endif; ?>
              <li class="social-share">
                <ul>
                  <li>
                    <a href="https://www.facebook.com/sharer?u=<?php echo get_the_permalink(); ?>t=<?php the_title(); ?>" target="_blank" rel="noopener noreferrer">
                      <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M32 16C32 7.16344 24.8366 0 16 0C7.16344 0 0 7.16344 0 16C0 23.9859 5.85094 30.6053 13.5 31.8056V20.625H9.4375V16H13.5V12.475C13.5 8.465 15.8888 6.25 19.5434 6.25C21.2934 6.25 23.125 6.5625 23.125 6.5625V10.5H21.1075C19.12 10.5 18.5 11.7334 18.5 13V16H22.9375L22.2281 20.625H18.5V31.8056C26.1491 30.6053 32 23.9859 32 16Z" fill="#1877F2"/>
                        <path d="M22.2281 20.625L22.9375 16H18.5V13C18.5 11.7347 19.12 10.5 21.1075 10.5H23.125V6.5625C23.125 6.5625 21.2941 6.25 19.5434 6.25C15.8888 6.25 13.5 8.465 13.5 12.475V16H9.4375V20.625H13.5V31.8056C15.1566 32.0648 16.8434 32.0648 18.5 31.8056V20.625H22.2281Z" fill="white"/>
                      </svg>
                    </a>
                   </li>
                   <li>
                    <a title="Compartir en Twitter" href="http://twitter.com/intent/tweet?text="Que rica receta! <?php echo get_the_title(); ?>&url=<?php echo get_the_permalink(); ?>" target="_blank" rel="noopener noreferrer">
                      <svg width="32" height="26" viewBox="0 0 32 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M10.0634 26.0009C22.1389 26.0009 28.7437 15.9964 28.7437 7.32058C28.7437 7.03642 28.7437 6.75354 28.7245 6.47194C30.0094 5.54255 31.1185 4.39179 32 3.07354C30.8019 3.60474 29.5307 3.95295 28.2291 4.1065C29.5998 3.28609 30.6255 1.99555 31.1155 0.475141C29.8268 1.23995 28.4168 1.77891 26.9466 2.06874C25.9567 1.01618 24.6475 0.319197 23.2216 0.0856541C21.7957 -0.147888 20.3326 0.0950277 19.0586 0.776812C17.7847 1.4586 16.771 2.54124 16.1743 3.85721C15.5777 5.17317 15.4314 6.64909 15.7581 8.05658C13.1479 7.92564 10.5943 7.24729 8.26327 6.06555C5.9322 4.88381 3.87569 3.22509 2.2272 1.19706C1.38764 2.64239 1.1305 4.35337 1.50813 5.98162C1.88577 7.60988 2.86979 9.033 4.25984 9.96122C3.21498 9.93061 2.19286 9.64873 1.28 9.13946V9.22266C1.28041 10.7385 1.80513 12.2075 2.76516 13.3805C3.72519 14.5535 5.06141 15.3584 6.5472 15.6585C5.58064 15.9221 4.5665 15.9607 3.58272 15.7711C4.00242 17.0756 4.81924 18.2163 5.91899 19.0337C7.01873 19.8512 8.34644 20.3046 9.71648 20.3305C8.35525 21.4005 6.79642 22.1916 5.12917 22.6585C3.46191 23.1254 1.71895 23.2591 0 23.0518C3.00244 24.9785 6.4959 26.0005 10.0634 25.9958" fill="#1DA1F2"/>
                      </svg>
                    </a>
                  </li>
                  <li>
                    <a href="https://t.me/share/url?url=<?php the_permalink(); ?>&text=<?php the_title(); ?>">
                      <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M16 32C24.8366 32 32 24.8366 32 16C32 7.16344 24.8366 0 16 0C7.16344 0 0 7.16344 0 16C0 24.8366 7.16344 32 16 32Z" fill="#28A7E8"/>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M7.24236 15.8311C11.9067 13.7989 15.017 12.4592 16.5732 11.8119C21.0166 9.96378 21.9399 9.64273 22.5417 9.63213C22.674 9.6298 22.97 9.6626 23.1617 9.81815C23.3235 9.9495 23.3681 10.1269 23.3894 10.2515C23.4107 10.376 23.4372 10.6597 23.4161 10.8813C23.1753 13.4113 22.1335 19.5509 21.6034 22.3845C21.3791 23.5835 20.9375 23.9855 20.51 24.0249C19.5808 24.1104 18.8753 23.4108 17.9753 22.8209C16.5671 21.8978 15.7716 21.3232 14.4047 20.4224C12.825 19.3814 13.849 18.8093 14.7493 17.8742C14.9849 17.6295 19.0787 13.9058 19.158 13.568C19.1679 13.5258 19.1771 13.3683 19.0835 13.2851C18.99 13.202 18.8519 13.2304 18.7523 13.253C18.611 13.2851 16.3614 14.772 12.0034 17.7138C11.3648 18.1523 10.7864 18.3659 10.2682 18.3547C9.69694 18.3424 8.59802 18.0317 7.78109 17.7662C6.77909 17.4405 5.98272 17.2682 6.05206 16.7151C6.08818 16.427 6.48495 16.1323 7.24236 15.8311Z" fill="white"/>
                      </svg>   
                    </a>
                  </li>
                  <li>
                    <a href="whatsapp://send?text=' + &lt;?php the_permalink(); ?&gt; + '&t=' + &lt;?php the_title(); ?&gt; return false;" target="_blank" aria-label="WhatsApp">
                      <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M27.2026 4.65289C24.2148 1.6498 20.2309 0 15.9886 0C7.25303 0 0.13685 7.11618 0.129247 15.8517C0.129247 18.6496 0.859111 21.3713 2.24281 23.7814L0 32L8.40864 29.7952C10.7275 31.0573 13.3352 31.7263 15.9886 31.7263H15.9962C24.7318 31.7263 31.8479 24.6101 31.8555 15.867C31.8479 11.6322 30.1981 7.64837 27.2026 4.65289ZM15.9886 29.0425C13.6165 29.0425 11.2977 28.4039 9.27536 27.2027L8.79638 26.9138L3.80898 28.2214L5.13946 23.3557L4.82775 22.8539C3.50487 20.7555 2.81302 18.3302 2.81302 15.8441C2.81302 8.59111 8.72796 2.67617 15.9962 2.67617C19.5163 2.67617 22.8235 4.05227 25.3172 6.53837C27.8033 9.03207 29.1718 12.3393 29.1718 15.8594C29.1642 23.1352 23.2492 29.0425 15.9886 29.0425ZM23.2188 19.1742C22.8235 18.9765 20.8772 18.0185 20.5122 17.8817C20.1473 17.7524 19.8812 17.684 19.6227 18.0794C19.3566 18.4747 18.5963 19.3718 18.3683 19.6303C18.1402 19.8964 17.9045 19.9268 17.5091 19.7292C17.1138 19.5315 15.8365 19.1133 14.3236 17.76C13.1452 16.7109 12.3545 15.4108 12.1188 15.0154C11.8907 14.6201 12.096 14.4072 12.2937 14.2096C12.4685 14.0347 12.689 13.7458 12.8867 13.5177C13.0843 13.2896 13.1528 13.1224 13.282 12.8563C13.4113 12.5902 13.3504 12.3621 13.2516 12.1644C13.1528 11.9667 12.3621 10.0128 12.0276 9.22214C11.7082 8.44666 11.3813 8.5531 11.138 8.5455C10.91 8.53029 10.6439 8.53029 10.3778 8.53029C10.1117 8.53029 9.68591 8.62913 9.32097 9.02447C8.95604 9.41982 7.93727 10.3778 7.93727 12.3317C7.93727 14.2856 9.35899 16.1635 9.55666 16.4296C9.75433 16.6957 12.3469 20.6947 16.3231 22.4129C17.2659 22.8235 18.0033 23.0668 18.5811 23.2492C19.5315 23.5533 20.3906 23.5077 21.0748 23.4089C21.8351 23.2948 23.4165 22.4509 23.751 21.5234C24.0779 20.5959 24.0779 19.8052 23.9791 19.6379C23.8802 19.4707 23.6141 19.3718 23.2188 19.1742Z" fill="#25D366"/>
                      </svg>
                    </a>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
          <?php if( $rcf['recipe_description'] ): ?>
          <p itemprop="abstract"><?php echo $rcf['recipe_description']; ?></p>
          <?php endif; ?>
        </div>
      <figure class="rc-main-picture" itemprop="image">
        <?php if ( has_post_thumbnail() ) { ?>
          <?php the_post_thumbnail('recipe-image'); ?>
        <?php } ?>
      </figure>
    </section>
    <section class="tools-facts">
      <?php if( $rcf['utensililos'] ): ?>
      <div class="tools" itemprop="tool" itemscope itemtype="https://schema.org/HowToTool">
        <h3>Utensilios</h3>
        <?php echo $rcf['utensililos']; ?>
      </div>
      <?php endif; ?>
      <?php if( $rcf['facts_serving'] ): ?>
      <div class="facts" itemscope itemtype="https://schema.org/NutritionInformation">
        <h3>Calorias & Macronutrientes</h3>
        <h4>Tamaño de la porción: <span  itemprop="servingSize"><?php echo $rcf['facts_serving']; ?></span></h4>
        <ul>
          <li>
            <h4>Calorias</h4>
            <span itemprop="calories"><?php echo $rcf['fact_kcal']; ?>kcal</span>
          </li>
          <li>
            <h4>Proteinas</h4>
            <span itemprop="proteinContent"><?php echo $rcf['fact_protein']; ?>g</span>
          </li>
          <li>
            <h4>Grasas</h4>
            <span itemprop="fatContent"><?php echo $rcf['fact_fats']; ?>g</span>
          </li>
          <li>
            <h4>Carbohidratos</h4>
            <span itemprop="carbohydrateContent"><?php echo $rcf['fact_carbs']; ?>g</span>
          </li>
          <li>
            <h4>Azucar</h4>
            <span itemprop="sugarContent"><?php echo $rcf['fact_sugar']; ?>g</span>
          </li>
        </ul>
        <small>Valores aproximados.</small>
      </div>
      <?php endif; ?>
    </section>
    <section class="steps-ingredients">
      <?php if( $rcf['prep_steps'] ): ?>
      <div class="steps" itemprop="recipeInstructions">
        <h2>¿Cómo se prepara?</h2>
        <?php echo $rcf['prep_steps']; ?>
      </div>
      <?php endif; ?>
      <?php if( $rcf['ingredients'] ): ?>
      <div class="ingredients" itemprop="recipeIngredient">
        <h3>Ingredientes</h3>
        <?php echo $rcf['ingredients']; ?>
      </div>
      <?php endif; ?>
    </section>