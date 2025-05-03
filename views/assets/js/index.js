const articles = [
    {
        content1: `<P class="par9">What if every child, in every country, could access trusted information <br> in their
                    native language? That’s not just a dream — it’s our mission. <br> In this post, we walk you through how our multilingual encyclopedia is <br> changing the way the world learns.</P>`,
        content2: `<p class="par7">Informations</p>`,   
        content3: `<p class="par8">Building an Encyclopedia <br> for the World </p>`, 
        image: "img1/blog-img-01.jpeg"
    },
    {
        content1: `<P class="par9">Imagine opening a textbook and not understanding a single word. <br> That’s the daily reality for millions of learners around the world. <br> In this blog, we explore how language can be the bridge—or the barrier—to <br> knowledge, and how multilingual education changes lives.</P>`,
        content2: `<p class="par7">Informations</p>`,   
        content3: `<p class="par8">Why Language Matters <br> in Education </p>`, 
        image: "img1/blog-img-03.jpeg"
    },
    {
        content1: `<P class="par9">The internet is full of information — but not all of it is <br> accessible, and not all of it is true. <br> Our platform relies on real people from real communities to review,<br> and refine articles. This is how we ensure truth travels far — and stays accurate.</P>`,
        content2: `<p class="par7">Informations</p>`,   
        content3: `<p class="par8">The Power of Community<br>-Curated Knowledge</p>`, 
        image: "img1/blog-img-04.jpeg"
    },
    {
        content1: `<P class="par9">You don’t need a PhD to make a difference. <br> Whether you speak Swahili, Hindi, French, or Filipino — your words have <br>power. Learn how you can contribute, translate, or edit articles and join a <br> growing global community of knowledge sharers.</P>`,
        content2: `<p class="par7">Informations</p>`,   
        content3: `<p class="par8">How You Can Help <br> Us Share Knowledge </p>`, 
        image: "img1/8d83a-rita-chou-qz8vplwqz6a-unsplash.webp"
    },
    {
        content1: `<P class="par9">🚀 Article 5: The future of space exploration is not far away. <br> We look at how technology is pushing us closer to <br> new horizons every day.</P>`,
        content2: `<p class="par7">Space Exploration</p>`,   
        content3: `<p class="par8">Exploring the <br> Boundaries of Space</p>`, 
        image: "img1/services.jpg"
    },
    {
        content1: `<P class="par9">🌱 Article 6: The Green Revolution — How sustainability <br> will change industries worldwide. <br> We discuss how businesses can adapt to the green economy.</P>`,
        content2: `<p class="par7">Sustainability</p>`,   
        content3: `<p class="par8">Adapting to the <br> Green Economy</p>`, 
        image: "img1/tree-architecture-sky-mansion-house-building-1007350-pxhere.com-edit.jpg"
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