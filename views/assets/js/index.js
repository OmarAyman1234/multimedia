
const articles = [
    {
        content1: `<P class="par9">
    What if every child, in every country, could access trusted <br>
    information in their native language? That’s not just a dream — <br>
    it’s our mission. In this post, we walk you through how <br>
    our multilingual encyclopedia is opening minds and <br>
    changing the way the world learns, one word at a time.
</P>
`,
        content2: `<p class="par7">Informations</p>`,   
        content3: `<p class="par8">Building an Encyclopedia <br> for the World </p>`, 
        image: "../assets/img/blog-img-01.jpeg"
    },
    {
        content1: `<P class="par9">
    Imagine opening a textbook and not understanding a single word. <br>
    That’s the daily reality for millions of learners worldwide. <br>
    In this blog, we explore how language can be the bridge — <br>
    or the barrier — to knowledge, and how multilingual <br>
    education has the power to transform lives.
</P>
`,
        content2: `<p class="par7">Informations</p>`,   
        content3: `<p class="par8">Why Language Matters <br> in Education </p>`, 
        image: "../assets/img/blog-img-03.jpeg"
    },
    {
        content1: `<P class="par9">
    The internet is full of information — but not all of it is accessible, <br>
    and not all of it is true. Our platform relies on real people <br>
    from real communities to review and refine content. <br>
    This human approach helps us build trust, ensure accuracy, <br>
    and make reliable knowledge available to everyone.
</P>
`,
        content2: `<p class="par7">Informations</p>`,   
        content3: `<p class="par8">The Power of Community<br>-Curated Knowledge</p>`, 
        image: "../assets/img/blog-img-04.jpeg"
    },
    {
        content1: `<P class="par9">
    You don’t need a PhD to make a difference. Whether you speak <br>
    Swahili, Hindi, French, or Filipino — your words have power. <br>
    Learn how you can contribute to our platform: translate, <br>
    edit, or improve articles and help grow a vibrant, <br>
    global community of knowledge sharers.
</P>
`,
        content2: `<p class="par7">Informations</p>`,   
        content3: `<p class="par8">How You Can Help <br> Us Share Knowledge </p>`, 
        image: "../assets/img/8d83a-rita-chou-qz8vplwqz6a-unsplash.webp"
    },
    {
        content1: `<P class="par9">
    🚀 Article 5: The future of space exploration is not far away. <br>
    Technology is advancing faster than ever, unlocking possibilities <br>
    we once thought were science fiction. From Mars missions to <br>
    lunar habitats, each breakthrough brings us closer to a new era. <br>
    In this post, we explore how innovation is propelling us forward.
</P>
`,
        content2: `<p class="par7">Space Exploration</p>`,   
        content3: `<p class="par8">Exploring the <br> Boundaries of Space</p>`, 
        image: "../assets/img/services.jpg"
    },
    {
        content1: `<P class="par9">
    🌱 Article 6: The Green Revolution — How sustainability <br>
    is reshaping the future of global industries and economies. <br>
    From renewable energy to eco-friendly innovations, change <br>
    is underway. Businesses must adapt or risk falling behind. <br>
    In this post, we explore the path to a greener tomorrow.
</P>
`,
        content2: `<p class="par7">Sustainability</p>`,   
        content3: `<p class="par8">Adapting to the <br> Green Economy</p>`, 
        image: "../assets/img/tree-architecture-sky-mansion-house-building-1007350-pxhere.com-edit.jpg"
    }
];
function shuffleArray(array) {
    const copy = [...array];
    for (let i = copy.length - 1; i > 0; i--) {
        const j = Math.floor(Math.random() * (i + 1));
        [copy[i], copy[j]] = [copy[j], copy[i]];
    }
    return copy;
}
function changeContent(divId, article) {
    const div = document.getElementById(divId);
    div.innerHTML = `
        <img src="${article.image}" alt="Article Image" style="width: 630px;height: 355px;border-radius: clamp(1.5rem, 1.3298rem + .8377vw, 2rem);">
        <p>${article.content2 || ""}</p>
        <p>${article.content3 || ""}</p>
        <p>${article.content1 || article.content || ""}</p>
    `;
}
function conc() {
    const shuffledArticles = shuffleArray(articles);
    const selectedArticles = shuffledArticles.slice(0, 4);
    changeContent("div4-2-1", selectedArticles[0]);
    changeContent("div1", selectedArticles[1]);
    changeContent("div2", selectedArticles[2]);
    changeContent("div3", selectedArticles[3]);
}
