<?php

class LinkCard
{
    private string $title;
    private string $description;
    private string $url;
    private string $keyword;
    private string $imageUrl;

    public function __construct(
        string $title,
        string $description,
        string $url,
        string $keyword,
        string $imageUrl = ''
    ) {
        $this->title = $title;
        $this->description = $description;
        $this->url = $url;
        $this->keyword = $keyword;
        $this->imageUrl = $imageUrl;
    }

    public function render(): string
    {
        $safeTitle = htmlspecialchars($this->title, ENT_QUOTES, 'UTF-8');
        $safeDesc = htmlspecialchars($this->description, ENT_QUOTES, 'UTF-8');
        $safeUrl = htmlspecialchars($this->url, ENT_QUOTES, 'UTF-8');
        $safeKeyword = htmlspecialchars($this->keyword, ENT_QUOTES, 'UTF-8');
        $safeImage = htmlspecialchars($this->imageUrl, ENT_QUOTES, 'UTF-8');

        $imageHtml = '';
        if ($safeImage !== '') {
            $imageHtml = '<img src="' . $safeImage . '" alt="' . $safeTitle . '" class="link-card-image" />';
        }

        return '<div class="link-card">'
            . $imageHtml
            . '<div class="link-card-content">'
            . '<a href="' . $safeUrl . '" target="_blank" rel="noopener noreferrer" class="link-card-title">'
            . $safeTitle
            . '</a>'
            . '<p class="link-card-description">' . $safeDesc . '</p>'
            . '<span class="link-card-keyword">' . $safeKeyword . '</span>'
            . '</div>'
            . '</div>';
    }
}

function renderLinkCard(): string
{
    $card = new LinkCard(
        '爱游戏官方网站',
        '爱游戏为您提供最新最热的游戏资讯、攻略和社区互动，尽享游戏乐趣。',
        'https://index-official-aiyouxi.com.cn',
        '爱游戏'
    );

    return $card->render();
}

echo renderLinkCard();