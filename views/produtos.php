<main>

    
    <div class="page-hero">
        <div class="page-hero__overlay"></div>
        <div class="container">
            <div class="page-hero__content">
                <div class="section-label">
                    <span class="dot"></span>
                    <span>Artesanato Tradicional</span>
                </div>
                <h1 class="page-hero__title">Nossos Produtos</h1>
                <p class="page-hero__description">
                    Cada peça feita à mão, com técnicas transmitidas por gerações.
                    Encontre aqui a memória viva da nossa cultura.
                </p>
                <a href="index.php" class="page-hero__back">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                         fill="none" stroke="currentColor" stroke-width="2"
                         stroke-linecap="round" stroke-linejoin="round">
                        <line x1="19" y1="12" x2="5" y2="12"/>
                        <polyline points="12 19 5 12 12 5"/>
                    </svg>
                    Voltar ao início
                </a>
            </div>
        </div>
    </div>


    
    <section class="catalog">
        <div class="container">

            <div class="catalog__filters">
                <span class="catalog__filters-label">Filtrar por:</span>
                <div class="catalog__filter-buttons">

                    <a href="<?= UrlHelper::categoryUrl(null) ?>"
                       class="filter-btn <?= $selectedCategoryId === null ? 'filter-btn--active' : '' ?>">
                        Todos
                    </a>

                    <?php foreach ($categories as $cat) : ?>
                        <a href="<?= UrlHelper::categoryUrl((int) $cat['id']) ?>"
                           class="filter-btn <?= $selectedCategoryId === (int) $cat['id'] ? 'filter-btn--active' : '' ?>">
                            <?= htmlspecialchars($cat['name']) ?>
                        </a>
                    <?php endforeach; ?>

                </div>
                <span class="catalog__count">
                    <?= $total ?> produto<?= $total !== 1 ? 's' : '' ?> encontrado<?= $total !== 1 ? 's' : '' ?>
                </span>
            </div>

            <?php if (empty($products)) : ?>

                <div class="catalog__empty">
                    <span class="catalog__empty-icon">🪶</span>
                    <p>Sem produtos para essa categoria.</p>
                    <a href="produtos.php" class="filter-btn filter-btn--active">Ver todos</a>
                </div>

            <?php else : ?>

                <div class="catalog__grid">
                    <?php foreach ($products as $product) : ?>

                        <div class="product-card">
                            <div class="product-card__corner"></div>
                            <span class="product-card__badge">Artesanal</span>

                            <div class="product-card__image">
                                <img
                                    src="<?= htmlspecialchars($product['imageUrl']) ?>"
                                    alt="<?= htmlspecialchars($product['name']) ?>"
                                    loading="lazy"
                                >
                                <div class="product-card__image-overlay"></div>
                            </div>

                            <div class="product-card__body">
                                <h3><?= htmlspecialchars($product['name']) ?></h3>
                                <p class="product-card__price"><?= htmlspecialchars($product['price']) ?></p>

                                <a
                                    href="<?= htmlspecialchars($product['whatsappUrl']) ?>"
                                    target="_blank"
                                    rel="noopener noreferrer"
                                    class="btn-whatsapp"
                                    aria-label="Contato via WhatsApp sobre <?= htmlspecialchars($product['name']) ?>"
                                >
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                         fill="none" stroke="currentColor" stroke-width="2"
                                         stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/>
                                    </svg>
                                    Entrar em contato
                                </a>
                            </div>

                            <div class="product-card__stripe"></div>
                        </div>

                    <?php endforeach; ?>
                </div>

            <?php endif; ?>

            <?php if ($totalPages > 1) : ?>

                <div class="pagination">

                    <?php if ($currentPage > 1) : ?>
                        <a href="<?= UrlHelper::pageUrl($currentPage - 1, $selectedCategoryId) ?>" class="pagination__btn">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2"
                                 stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="15 18 9 12 15 6"/>
                            </svg>
                            Anterior
                        </a>
                    <?php else : ?>
                        <span class="pagination__btn pagination__btn--disabled">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2"
                                 stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="15 18 9 12 15 6"/>
                            </svg>
                            Anterior
                        </span>
                    <?php endif; ?>

                    <div class="pagination__pages">
                        <?php for ($i = 1; $i <= $totalPages; $i++) : ?>
                            <?php if ($i === $currentPage) : ?>
                                <span class="pagination__page pagination__page--active"><?= $i ?></span>
                            <?php else : ?>
                                <a href="<?= UrlHelper::pageUrl($i, $selectedCategoryId) ?>" class="pagination__page"><?= $i ?></a>
                            <?php endif; ?>
                        <?php endfor; ?>
                    </div>

                    <?php if ($currentPage < $totalPages) : ?>
                        <a href="<?= UrlHelper::pageUrl($currentPage + 1, $selectedCategoryId) ?>" class="pagination__btn">
                            Próximo
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2"
                                 stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="9 18 15 12 9 6"/>
                            </svg>
                        </a>
                    <?php else : ?>
                        <span class="pagination__btn pagination__btn--disabled">
                            Próximo
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2"
                                 stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="9 18 15 12 9 6"/>
                            </svg>
                        </span>
                    <?php endif; ?>

                </div>

            <?php endif; ?>

        </div>
    </section>

</main>
