-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2025 at 05:03 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `multimedia`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `title` varchar(300) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `content` varchar(15000) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `image` varchar(1500) NOT NULL,
  `editorId` int(11) NOT NULL,
  `categoryId` int(11) NOT NULL,
  `publishDate` datetime NOT NULL DEFAULT current_timestamp(),
  `isDeleted` tinyint(1) NOT NULL DEFAULT 0,
  `isEdited` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `title`, `content`, `image`, `editorId`, `categoryId`, `publishDate`, `isDeleted`, `isEdited`) VALUES
(1, 'The French Revolution', 'The French Revolution was a pivotal event in world history that began in 1789 and lasted until 1799. It fundamentally changed the social and political structure of France and had far-reaching effects across Europe and the world. The Revolution emerged from a combination of long-standing economic troubles, social inequality, political mismanagement, and the influence of Enlightenment thinkers who advocated liberty, equality, and fraternity.\n\nFrance, under King Louis XVI, was facing a massive national debt and a rigid social hierarchy that divided society into three estates: the clergy (First Estate), the nobility (Second Estate), and the common people (Third Estate), who made up over 95% of the population but had the least political power. The calling of the Estates-General in May 1789 led to a standoff between the king and the Third Estate, which eventually declared itself the National Assembly and vowed to create a new constitution.\n\nThe storming of the Bastille on July 14, 1789, became a symbol of the people’s revolt against tyranny. Over the following years, the monarchy was dismantled, feudal privileges were abolished, and a republic was proclaimed in 1792. The king and queen, Louis XVI and Marie Antoinette, were tried and executed by guillotine in 1793. However, the Revolution soon entered a radical and violent phase known as the Reign of Terror, led by the Jacobins and Maximilien Robespierre, during which thousands were executed.\n\nEventually, the violence waned, and power shifted again. In 1799, Napoleon Bonaparte staged a coup d\'état and established himself as First Consul, effectively ending the Revolution. Despite its turmoil, the French Revolution had a lasting impact: it spread revolutionary ideas, influenced the rise of modern democracies, and laid the groundwork for the development of human rights and constitutional governance.', '..\\assets\\img\\articleImages\\pexels-dhenry-6351373.jpg', 2, 1, '2025-05-03 15:52:54', 0, 0),
(2, 'World War II', 'World War II was the most widespread and deadliest conflict in human history, lasting from 1939 to 1945 and involving more than 100 million people across more than 30 countries. It began on September 1, 1939, when Nazi Germany, under the leadership of Adolf Hitler, invaded Poland. This act prompted Britain and France to declare war on Germany, setting off a chain of global alliances and conflicts.\r\n\r\nThe war was fought between two major alliances: the Axis Powers (primarily Germany, Italy, and Japan) and the Allied Powers (led by the United Kingdom, the Soviet Union, the United States, China, and others). Each front of the war had its own complexities. In Europe, Germany’s Blitzkrieg tactics led to the rapid conquest of many countries. In the Pacific, Japan expanded aggressively throughout East Asia and the Pacific islands.\r\n\r\nA turning point came in 1941 when Germany invaded the Soviet Union and Japan attacked the U.S. naval base at Pearl Harbor, bringing the United States fully into the war. The conflict grew more intense with massive battles such as Stalingrad, El Alamein, and the Normandy landings on D-Day in 1944.\r\n\r\nOne of the darkest chapters of the war was the Holocaust, during which Nazi Germany systematically murdered six million Jews and millions of others, including Romani people, disabled individuals, and political dissidents. The war also saw the use of total war strategies, including strategic bombing campaigns that devastated cities.\r\n\r\nThe war in Europe ended in May 1945 with Germany’s surrender following Hitler’s suicide. In the Pacific, the conflict concluded after the United States dropped atomic bombs on Hiroshima and Nagasaki in August 1945, forcing Japan to surrender. The aftermath of World War II included the formation of the United Nations, the start of the Cold War, the division of Germany, and widespread reconstruction efforts.\r\n\r\nThe war reshaped the political, social, and economic landscape of the world and remains a defining moment of the 20th century.', '..\\assets\\img\\articleImages\\pexels-dale-filhaber-1198801-31881263.jpg', 9, 1, '2025-05-03 16:10:45', 0, 0),
(3, 'The American Civil War', 'The American Civil War, fought from 1861 to 1865, was a defining moment in United States history. It was primarily a conflict between the Northern states (the Union) and the Southern states (the Confederacy) over issues such as states’ rights, economic policies, and, most significantly, the expansion and morality of slavery.\r\n\r\nThe war began after eleven Southern states seceded from the Union following the election of Abraham Lincoln in 1860, who was seen by the South as a threat to the institution of slavery. These states formed the Confederate States of America with Jefferson Davis as their president. The first shots were fired at Fort Sumter, South Carolina, in April 1861, marking the official start of the war.\r\n\r\nThe Union, with its industrial strength, larger population, and more developed infrastructure, initially underestimated the resolve of the Confederacy. Major battles occurred at Antietam, Gettysburg, Shiloh, and Vicksburg, among many others. The war also saw advances in military technology and tactics, including ironclad ships, trench warfare, and the use of railroads for troop movement.\r\n\r\nOne of the most transformative events of the war was the Emancipation Proclamation, issued by President Lincoln in 1863, which declared the freedom of all enslaved people in Confederate-held territories. This shifted the war’s focus to a moral crusade against slavery and discouraged foreign powers like Britain and France from recognizing the Confederacy.\r\n\r\nThe war reached its climax in April 1865 when General Robert E. Lee surrendered to General Ulysses S. Grant at Appomattox Court House in Virginia. Just days later, Lincoln was assassinated by Confederate sympathizer John Wilkes Booth, deepening national grief but also uniting the North in determination.\r\n\r\nThe Civil War claimed over 600,000 lives and left the South economically and socially devastated. Reconstruction followed, aiming to rebuild the South and integrate freed slaves into American society. Though it formally ended slavery and preserved the Union, the war’s legacy of racial tension and regional division would endure for generations.\r\n\r\n', '..\\assets\\img\\articleImages\\pexels-rdne-8865407.jpg', 10, 1, '2025-05-03 16:24:00', 0, 0),
(4, 'The Theory of Relativity', 'The Theory of Relativity, developed by Albert Einstein in the early 20th century, revolutionized the field of physics and dramatically changed our understanding of space, time, and gravity. It consists of two main parts: Special Relativity and General Relativity.\r\n\r\nSpecial Relativity, published in 1905, introduced the concept that the laws of physics are the same for all non-accelerating observers. It also postulated that the speed of light in a vacuum is constant for all observers, regardless of their motion. This led to groundbreaking conclusions, such as time dilation (time moving slower for objects in motion) and length contraction (objects appear shorter in motion relative to a stationary observer). The famous equation E=mc², which expresses the equivalence of mass and energy, comes from this theory.\r\n\r\nGeneral Relativity, published in 1915, expanded upon Special Relativity by incorporating acceleration and gravity. Einstein proposed that gravity is not a force between masses, as Newton had suggested, but rather a result of the curvature of spacetime caused by mass and energy. Massive objects like stars and planets warp the space around them, and this curvature influences the motion of other objects.\r\n\r\nGeneral Relativity has passed numerous experimental tests. For instance, it predicted the bending of light around the sun, confirmed during a solar eclipse in 1919. It also forms the foundation for modern cosmology, helping to explain black holes, the expansion of the universe, and gravitational waves—ripples in spacetime detected for the first time in 2015.\r\n\r\nEinstein’s Theory of Relativity remains one of the most profound achievements in science, offering a new framework for understanding the universe and inspiring further breakthroughs in physics and technology.', '..\\assets\\img\\articleImages\\pexels-jeshoots-com-147458-714699.jpg', 1, 3, '2025-05-03 16:35:56', 0, 0),
(5, 'Artificial Intelligence', 'Artificial Intelligence (AI) refers to the ability of machines and computer systems to perform tasks that typically require human intelligence. These tasks include learning, reasoning, problem-solving, perception, understanding language, and decision-making. AI has rapidly evolved from a theoretical concept to a practical technology that influences nearly every aspect of modern life.\r\n\r\nThe field of AI began in the mid-20th century, with early pioneers such as Alan Turing and John McCarthy laying the theoretical foundations. In the decades that followed, advances in computing power, algorithms, and data availability allowed AI to progress from simple rule-based systems to more sophisticated models capable of learning from experience—what we now call machine learning.\r\n\r\nMachine learning, especially deep learning, has driven much of the current AI revolution. It allows systems to learn patterns from large datasets, enabling applications like speech recognition, computer vision, natural language processing, and autonomous vehicles. AI now powers digital assistants like Siri and Alexa, recommends content on streaming platforms, detects fraud in financial systems, and supports medical diagnostics with greater precision than ever before.\r\n\r\nA particularly powerful application of AI is generative models, which can create new content such as images, music, and text. Tools like ChatGPT and image generators demonstrate how AI can enhance creativity and productivity across many industries.\r\n\r\nDespite its benefits, AI also raises important ethical and societal questions. Issues such as algorithmic bias, data privacy, automation of jobs, and the potential for misuse are subjects of ongoing debate. Many experts advocate for responsible AI development with transparency, fairness, and accountability at its core.\r\n\r\nAs AI continues to advance, it holds the potential to reshape education, healthcare, transportation, entertainment, and more. The future of AI will depend not only on technological progress but also on the choices we make about how it is governed and integrated into society.', '..\\assets\\img\\articleImages\\pexels-tara-winstead-8386440.jpg', 3, 3, '2025-05-03 16:51:54', 0, 0),
(6, 'Space Exploration', 'Space exploration is the investigation of outer space through the use of astronomy, space technology, and spacecraft. It represents one of humanity’s most ambitious endeavors, fueled by curiosity, scientific discovery, and the desire to understand our place in the universe.\r\n\r\nThe journey began with the launch of Sputnik 1 by the Soviet Union in 1957, marking the first human-made object to orbit the Earth. This event sparked the Space Race, a competition primarily between the United States and the USSR during the Cold War. It led to monumental achievements, including the first human in space—Yuri Gagarin in 1961—and the Apollo 11 Moon landing in 1969, when Neil Armstrong and Buzz Aldrin became the first humans to walk on the Moon.\r\n\r\nSince then, space exploration has expanded far beyond national rivalries. The creation of the International Space Station (ISS) in the late 1990s brought together scientists and astronauts from many countries, enabling long-term research in microgravity and international collaboration.\r\n\r\nRobotic missions have also transformed our understanding of the solar system. Probes like Voyager 1 and 2, Cassini, and New Horizons have visited distant planets and moons, while Mars rovers like Curiosity and Perseverance have explored the Martian surface in search of signs of past life. Telescopes such as Hubble and James Webb allow us to peer deep into the cosmos, uncovering galaxies and phenomena billions of light-years away.\r\n\r\nPrivate companies such as SpaceX, Blue Origin, and Rocket Lab have revolutionized spaceflight by making it more cost-effective and reusable. This new era of commercialization opens the door for future missions to the Moon, Mars, and beyond—possibly including space tourism.\r\n\r\nSpace exploration faces challenges such as high costs, long travel times, and extreme environments. However, it also drives innovation in materials, communication, navigation, and medicine, with benefits that reach back to Earth.\r\n\r\nAbove all, space exploration represents humanity’s enduring quest to explore the unknown, inspiring generations to dream, discover, and expand the frontiers of knowledge.\r\n\r\n', '..\\assets\\img\\articleImages\\pexels-stephen-hazelwood-842184425-31859143.jpg', 6, 3, '2025-05-03 17:46:10', 0, 0),
(7, 'The Amazon Rainforest', 'The Amazon Rainforest, often referred to as the \"lungs of the Earth,\" is the largest tropical rainforest in the world, covering approximately 5.5 million square kilometers across nine South American countries. The majority lies within Brazil, but it also stretches into Peru, Colombia, Venezuela, Ecuador, Bolivia, Guyana, Suriname, and French Guiana.\r\n\r\nThis vast forest is home to the Amazon River, one of the longest and most voluminous rivers in the world. The rainforest supports an astonishing range of biodiversity, including over 40,000 plant species, 1,300 bird species, 430 mammal species, and 2.5 million insect species. It is the most biodiverse place on Earth and a critical habitat for countless endemic and endangered species.\r\n\r\nThe Amazon plays a crucial role in regulating the global climate. Its trees absorb enormous amounts of carbon dioxide and release oxygen, helping mitigate the effects of climate change. Additionally, its thick canopy influences rainfall patterns not only in South America but across the globe.\r\n\r\nIndigenous peoples have lived in the Amazon for thousands of years, preserving traditional knowledge and maintaining a symbiotic relationship with the forest. Despite their contributions to conservation, they often face threats from land exploitation and deforestation.\r\n\r\nUnfortunately, the Amazon is under increasing pressure from logging, mining, agriculture, and infrastructure development. Deforestation has accelerated in recent decades, contributing to loss of biodiversity, disruption of ecosystems, and increased greenhouse gas emissions.\r\n\r\nProtecting the Amazon is a global responsibility. International cooperation, sustainable development practices, and the strengthening of indigenous rights are vital to preserving this unique and irreplaceable ecosystem for future generations.', '..\\assets\\img\\articleImages\\amazon-rainforest.jpg', 8, 2, '2025-05-03 18:01:40', 0, 0),
(8, 'Mount Everest', 'Mount Everest, known as the highest peak on Earth, rises to an elevation of 8,848.86 meters (29,031.7 feet) above sea level. It is part of the Himalayan mountain range and straddles the border between Nepal and the Tibet Autonomous Region of China. Known in Nepali as Sagarmatha and in Tibetan as Chomolungma, the mountain has long held spiritual significance for local communities.\r\n\r\nEverest was first identified as the world’s tallest mountain in 1856 by the Great Trigonometrical Survey of India. It was named after Sir George Everest, a British surveyor general. The peak became a symbol of human endurance and ambition, attracting explorers, scientists, and adventurers from around the world.\r\n\r\nThe first successful ascent occurred on May 29, 1953, by Sir Edmund Hillary of New Zealand and Tenzing Norgay, a Sherpa of Nepal. Their feat marked a turning point in mountaineering history and brought global attention to the Himalayan region.\r\n\r\nClimbing Everest is an extreme challenge, even for experienced mountaineers. Harsh weather, thin air, crevasses, avalanches, and the so-called “death zone” above 8,000 meters make the climb perilous. Acclimatization, proper equipment, and support from experienced Sherpas are essential for survival.\r\n\r\nDespite the dangers, the mountain sees hundreds of climbers each year. However, this popularity has brought environmental and ethical concerns. Trash, overcrowding, and risk to human life are major issues. Many organizations and local authorities have begun implementing stricter regulations, cleanup efforts, and sustainability measures.\r\n\r\nEverest also serves as an important climate indicator. Glacial melt, shifting snowlines, and increased risk of landslides are signs of climate change in the region. Studying these changes provides critical insight into the health of the planet.\r\n\r\nMount Everest remains both a geographical marvel and a profound metaphor for human aspiration, resilience, and responsibility toward nature.', '..\\assets\\img\\articleImages\\pexels-abdulkayum97-25245177.jpg', 10, 2, '2025-05-03 18:25:24', 0, 0),
(9, 'The Great Barrier Reef', 'The Great Barrier Reef is the world’s largest coral reef system, stretching over 2,300 kilometers along the northeast coast of Australia. Composed of more than 2,900 individual reefs and 900 islands, it covers an area of approximately 344,400 square kilometers in the Coral Sea. It is so vast that it can be seen from space.\r\n\r\nThis marine ecosystem is home to an extraordinary diversity of life. Over 1,500 species of fish, 400 types of coral, 4,000 species of mollusks, and countless marine birds, turtles, and marine mammals make their home here. It is one of the most complex and biologically rich environments on Earth.\r\n\r\nThe Great Barrier Reef has immense ecological, economic, and cultural significance. It supports local and international tourism, fishing industries, and the livelihoods of Indigenous Australians who have lived in harmony with these waters for thousands of years. In 1981, it was designated a UNESCO World Heritage Site due to its outstanding natural value.\r\n\r\nHowever, the reef is under grave threat from human activity and climate change. Rising sea temperatures have caused widespread coral bleaching events, weakening or killing large portions of the reef. Pollution from agriculture, coastal development, and overfishing also harm its delicate ecosystem.\r\n\r\nEfforts are underway to conserve and restore the reef. Marine protected areas, reef monitoring programs, and scientific research aim to understand the changes and find solutions. Community engagement and sustainable practices are also key to ensuring its survival.\r\n\r\nThe future of the Great Barrier Reef depends on global action to combat climate change and protect our oceans. As a living monument of natural beauty and resilience, it calls for stewardship, awareness, and a commitment to preserving the Earth’s fragile marine environments.', '..\\assets\\img\\articleImages\\pexels-eclipse-chasers-716719984-26726469.jpg', 9, 2, '2025-05-03 18:51:20', 0, 0),
(15, 'Nelson Mandela – Champion of Freedom and Reconciliation', 'Nelson Mandela, born in 1918 in the rural village of Mvezo, South Africa, became a global icon of peace, justice, and resilience. As the first Black president of South Africa and a lifelong freedom fighter, Mandela led the struggle against apartheid—a brutal system of racial segregation that oppressed millions of South Africans for decades.\r\n\r\nMandela studied law at the University of Fort Hare and the University of Witwatersrand before joining the African National Congress (ANC), a political party committed to ending apartheid. In the 1950s and 60s, he became a key figure in organizing protests, strikes, and acts of civil disobedience, championing equality and dignity for all South Africans.\r\n\r\nIn 1962, Mandela was arrested and eventually sentenced to life imprisonment for conspiring to overthrow the government. He spent 27 years in prison, mostly on Robben Island, enduring harsh conditions, isolation, and forced labor. Yet he emerged not bitter, but with a vision for a united South Africa based on forgiveness and cooperation.\r\n\r\nUpon his release in 1990, Mandela played a crucial role in negotiating a peaceful transition from apartheid to democracy. In 1994, he was elected president in the country’s first multiracial democratic election. His presidency focused on national reconciliation, education, poverty alleviation, and building institutions that respected the rights of all citizens.\r\n\r\nMandela\'s leadership style—firm yet humble, forgiving yet principled—earned him admiration worldwide. He voluntarily stepped down after one term, believing that power should serve the people, not personal ambition. His later years were devoted to philanthropy, especially through the Nelson Mandela Foundation, which promotes social justice and human rights.\r\n\r\nHe passed away in 2013 at the age of 95, leaving behind a legacy of courage, wisdom, and moral leadership. Nelson Mandela is remembered not only as a liberator of his people, but as a symbol of hope for oppressed communities around the globe.\r\n\r\n', '..\\assets\\img\\articleImages\\mandela-1024x551.jpg', 7, 5, '2025-05-03 21:22:32', 0, 0),
(21, 'Mental Health – Understanding, Stigma, and Modern Treatment', 'Mental health is a crucial aspect of overall well-being, encompassing emotional, psychological, and social functioning. It influences how individuals think, feel, behave, handle stress, relate to others, and make choices. While physical health often receives the majority of attention in medical discussions, mental health is equally vital, and its neglect can lead to severe consequences on both individual and societal levels.\r\n\r\nThe concept of mental health has evolved over time. In ancient civilizations, mental illness was often misunderstood and attributed to supernatural forces or moral failings. For centuries, people with mental disorders were isolated, imprisoned, or subjected to inhumane treatments. The shift toward more compassionate and scientific understandings began in the 18th and 19th centuries, particularly with the work of reformers such as Philippe Pinel in France and Dorothea Dix in the United States, who advocated for the humane treatment of patients.\r\n\r\nToday, mental health is recognized as a legitimate medical concern, with a complex interplay of biological, psychological, and social factors. Disorders such as depression, anxiety, bipolar disorder, schizophrenia, and post-traumatic stress disorder (PTSD) affect hundreds of millions worldwide. These conditions can impair daily functioning, relationships, and quality of life, and in severe cases, can lead to self-harm or suicide.\r\n\r\nOne of the most pervasive barriers to mental health care is stigma. Negative stereotypes, shame, and discrimination prevent many individuals from seeking help. In some cultures, mental illness is still seen as a weakness or character flaw, leading sufferers to hide their struggles. Mental health advocacy groups have worked tirelessly to raise awareness, normalize discussions about mental well-being, and promote the message that seeking help is a sign of strength, not weakness.\r\n\r\nThe modern approach to mental health involves early detection, diagnosis, and a combination of treatments, including therapy, medication, lifestyle changes, and community support. Psychotherapy—also known as talk therapy—includes methods such as Cognitive Behavioral Therapy (CBT), psychodynamic therapy, and mindfulness-based approaches, which help individuals process emotions, change harmful patterns of thought, and develop healthier coping strategies.\r\n\r\nPharmacological treatments such as antidepressants, antipsychotics, and mood stabilizers play an essential role in managing the symptoms of many disorders. While these medications are not cures, they can significantly improve a person’s functioning when prescribed appropriately and monitored by professionals.\r\n\r\nMental health care also involves preventive strategies, such as promoting emotional resilience, teaching stress management, encouraging social connection, and creating environments where people feel safe and valued. Workplaces, schools, and governments are increasingly recognizing the economic and social costs of ignoring mental health and are implementing policies to provide better access to care.\r\n\r\nThe COVID-19 pandemic placed unprecedented stress on global mental health systems. Isolation, fear, financial insecurity, and grief triggered widespread psychological distress. However, the crisis also accelerated the adoption of telehealth services, allowing individuals to access therapy and support remotely. Mental health apps, virtual therapy platforms, and online support groups became more common, improving accessibility for many, especially in underserved areas.\r\n\r\nDespite progress, many challenges remain. Mental health care is still underfunded in many countries, and there are significant shortages of trained professionals. Inequities based on race, gender, income, and geography also affect who receives timely and effective treatment.\r\n\r\nPromoting mental health requires a holistic, integrated approach—one that combines clinical care, public policy, community engagement, and education. It also demands ongoing efforts to break down stigma and foster empathy and understanding across all segments of society.\r\n\r\nAs awareness grows and treatment methods improve, the hope is that mental health will be fully integrated into general health care systems, treated with the same urgency and respect as physical health. Mental well-being is not a luxury—it is a human right, essential to thriving individuals and resilient communities.', '..\\assets\\img\\articleImages\\mental-health-ball-blog.jpg', 8, 7, '2025-05-05 08:17:11', 0, 0),
(23, 'New article', 'dsaflkasdj;fklsdajkfahsdlkfjasd hljk klfhasdklfjkasldfsd lksdklf jsakl sdjfklaj fsdlkfj asklfjadifjsadklfja;slkfjaskdl kldjflkasd ;flkadj aj;fkla ;fljdlkfjsd;klf; klj fkasj kfa;k', '', 40, 3, '2025-05-13 11:09:53', 1, 0),
(24, 'kjhjkhkjkj', 'khjkkjhjklhkhl', '../../views/assets/img/Screenshot 2023-12-21 135556.png', 38, 7, '2025-05-14 15:03:37', 1, 0),
(25, 'a1', 'sdafas', '', 22, 6, '2025-05-28 17:48:58', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'History'),
(2, 'Geography & Nature'),
(3, 'Science & Technology'),
(4, 'Culture & Arts'),
(5, 'Famous People'),
(6, 'Philosophy & Thoughts'),
(7, 'Health & Medicine');

-- --------------------------------------------------------

--
-- Table structure for table `interactions`
--

CREATE TABLE `interactions` (
  `id` int(11) NOT NULL,
  `typeId` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `content` varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `userId` int(11) NOT NULL,
  `articleId` int(11) NOT NULL,
  `isDeleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `interactions`
--

INSERT INTO `interactions` (`id`, `typeId`, `date`, `content`, `userId`, `articleId`, `isDeleted`) VALUES
(1, 1, '2025-05-05 18:22:19', '', 11, 5, 1),
(2, 2, '2025-05-05 18:22:19', 'This is awesome!', 11, 5, 0),
(3, 1, '2025-05-05 18:46:22', '', 12, 5, 1),
(4, 2, '2025-05-05 18:46:22', 'Hello again', 11, 5, 0),
(5, 2, '2025-05-05 18:46:40', 'Hello there!', 12, 5, 1),
(6, 2, '2025-05-05 20:31:17', 'aa', 11, 5, 0),
(7, 2, '2025-05-05 20:31:26', 'Wow!', 11, 5, 0),
(8, 2, '2025-05-05 20:33:29', 'xas', 11, 5, 0),
(9, 2, '2025-05-05 20:33:34', 'xsadfsdf', 11, 5, 0),
(10, 2, '2025-05-05 20:33:54', 'xaaaaaaa', 11, 5, 0),
(11, 2, '2025-05-05 20:39:54', 'Comment! Testingg', 11, 6, 0),
(12, 2, '2025-05-05 20:40:04', 'Comment!', 11, 6, 0),
(13, 2, '2025-05-05 20:40:16', 'Comment!', 11, 6, 0),
(14, 2, '2025-05-05 20:46:06', 'xc', 11, 6, 0),
(15, 2, '2025-05-05 20:46:10', 'xc', 11, 6, 0),
(16, 2, '2025-05-05 20:47:09', 'xc', 11, 6, 0),
(17, 2, '2025-05-05 20:47:13', 'xc', 11, 6, 0),
(18, 2, '2025-05-05 20:47:19', 'a', 11, 6, 0),
(19, 2, '2025-05-05 20:48:14', 'aa', 11, 6, 0),
(20, 2, '2025-05-05 20:56:09', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 11, 6, 0),
(21, 2, '2025-05-06 00:37:20', 'تجربة تعليق، هل اصبح يعمل؟', 11, 5, 1),
(24, 2, '2025-05-06 00:49:14', 'jjaa', 1, 5, 0),
(38, 2, '2025-05-08 18:48:13', 'jj', 24, 4, 0),
(39, 2, '2025-05-08 18:59:15', 'ss', 30, 2, 0),
(40, 2, '2025-05-08 19:21:40', 'Wow', 31, 2, 1),
(41, 2, '2025-05-08 21:18:51', 'Wow!', 8, 7, 0),
(42, 2, '2025-05-08 22:14:00', 'sdfasdf', 11, 3, 0),
(46, 1, '2025-05-09 22:14:49', '', 18, 5, 0),
(47, 1, '2025-05-09 22:16:20', '', 14, 5, 0),
(48, 1, '2025-05-09 22:23:45', '', 11, 4, 1),
(49, 1, '2025-05-09 22:48:29', '', 11, 1, 1),
(50, 2, '2025-05-09 22:48:55', 'jjjkljlkjkl', 11, 1, 1),
(51, 1, '2025-05-09 23:15:58', '', 11, 4, 0),
(52, 1, '2025-05-10 22:06:34', '', 11, 15, 1),
(53, 2, '2025-05-10 22:06:42', 'sdfasdfasdfadsfasdfds', 11, 15, 1),
(54, 2, '2025-05-12 00:09:01', 'sdaf', 11, 2, 0),
(55, 2, '2025-05-12 18:48:54', 'aaa', 16, 5, 0),
(56, 2, '2025-05-12 18:51:31', 'Joker', 16, 5, 0),
(57, 2, '2025-05-12 18:51:58', 'x', 16, 5, 0),
(58, 2, '2025-05-12 18:53:19', 'tq', 16, 5, 1),
(59, 2, '2025-05-12 18:53:50', 'aa', 16, 5, 0),
(60, 2, '2025-05-12 18:56:33', 'a', 16, 5, 0),
(61, 2, '2025-05-12 18:57:35', 'f', 16, 5, 1),
(62, 2, '2025-05-12 20:38:44', 'aabbcc', 16, 5, 0),
(63, 2, '2025-05-12 20:52:22', 'tqqwcv', 11, 5, 1),
(64, 1, '2025-05-12 20:53:39', '', 11, 5, 1),
(66, 1, '2025-05-13 13:08:54', '', 11, 5, 0),
(67, 2, '2025-05-14 15:07:09', 'fasdf', 38, 1, 0),
(68, 1, '2025-05-14 15:07:11', '', 38, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `interactiontypes`
--

CREATE TABLE `interactiontypes` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `interactiontypes`
--

INSERT INTO `interactiontypes` (`id`, `name`) VALUES
(1, 'like'),
(2, 'comment');

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` int(11) NOT NULL,
  `name` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `name`) VALUES
(1, 'English'),
(2, 'French'),
(3, 'Spanish');

-- --------------------------------------------------------

--
-- Table structure for table `lists`
--

CREATE TABLE `lists` (
  `id` int(11) NOT NULL,
  `creationDate` datetime NOT NULL DEFAULT current_timestamp(),
  `name` varchar(150) NOT NULL,
  `isDeleted` tinyint(1) DEFAULT 0,
  `userId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lists`
--

INSERT INTO `lists` (`id`, `creationDate`, `name`, `isDeleted`, `userId`) VALUES
(1, '2025-05-05 00:00:00', 'List1', 1, 11),
(2, '2025-05-05 00:00:00', 'a', 1, 11),
(3, '2025-05-05 00:00:00', 'test', 1, 11),
(4, '2025-05-05 00:00:00', 's', 1, 11),
(5, '2025-05-05 00:00:00', 'a', 1, 11),
(6, '2025-05-05 00:00:00', 'aa', 1, 11),
(7, '2025-05-06 00:00:00', 'Bookmarks', 0, 14),
(8, '2025-05-07 00:00:00', 'Bookmarks', 0, 15),
(9, '2025-05-07 00:00:00', 'kk', 0, 13),
(10, '2025-05-07 00:00:00', 'aaa', 0, 13),
(11, '2025-05-07 00:00:00', 'a', 0, 13),
(12, '2025-05-07 00:00:00', 'aa', 0, 13),
(13, '2025-05-07 00:00:00', 'aaa', 0, 13),
(14, '2025-05-07 00:00:00', 'c', 0, 13),
(15, '2025-05-07 00:00:00', 'c', 0, 13),
(16, '2025-05-07 00:00:00', 'czx', 0, 13),
(17, '2025-05-07 00:00:00', 'xr', 0, 13),
(18, '2025-05-07 00:00:00', 'FG', 1, 13),
(19, '2025-05-07 00:00:00', 'Bookmarks', 0, 16),
(20, '2025-05-07 00:00:00', 'Bookmarks', 0, 17),
(21, '2025-05-07 00:00:00', 'Bookmarks', 0, 18),
(22, '2025-05-07 00:00:00', 'Bookmarks', 0, 19),
(23, '2025-05-08 00:00:00', 'Bookmarks', 0, 20),
(24, '2025-05-08 00:00:00', 'Bookmarks', 0, 21),
(25, '2025-05-08 00:00:00', 'Bookmarks', 0, 22),
(26, '2025-05-08 00:00:00', 'Bookmarks', 0, 23),
(27, '2025-05-08 00:00:00', 'Bookmarks', 0, 24),
(28, '2025-05-08 00:00:00', 'Bookmarks', 0, 25),
(29, '2025-05-08 00:00:00', 'Bookmarks', 0, 26),
(30, '2025-05-08 00:00:00', 'Bookmarks', 0, 27),
(31, '2025-05-08 00:00:00', 'Bookmarks', 0, 28),
(32, '2025-05-08 00:00:00', 'Bookmarks', 0, 29),
(33, '2025-05-08 00:00:00', 'Bookmarks', 0, 30),
(34, '2025-05-08 00:00:00', 'Bookmarks', 0, 31),
(35, '2025-05-08 00:00:00', 'Bookmarks', 0, 32),
(36, '2025-05-08 00:00:00', 'Bookmarks', 0, 33),
(37, '2025-05-08 00:00:00', '111', 1, 11),
(38, '2025-05-08 00:00:00', '111', 1, 11),
(39, '2025-05-08 00:00:00', 'test', 1, 11),
(41, '2025-05-09 00:00:00', 't', 1, 11),
(42, '2025-05-09 00:00:00', 'y', 1, 11),
(43, '2025-05-09 00:00:00', 'aaa', 1, 11),
(44, '2025-05-09 00:00:00', 'aaa', 1, 11),
(45, '2025-05-09 00:00:00', 'haha', 1, 11),
(46, '2025-05-09 00:00:00', '', 1, 11),
(47, '2025-05-09 00:00:00', 'Bookmarks', 0, 11),
(50, '2025-05-10 22:07:25', 'ss', 1, 11),
(51, '2025-05-12 21:21:41', 'Bookmarks', 0, 35),
(52, '2025-05-12 21:23:59', 'Bookmarks', 0, 36),
(53, '2025-05-12 21:25:54', 'Bookmarks', 0, 37),
(54, '2025-05-12 22:25:00', 'test', 1, 11),
(55, '2025-05-12 22:26:25', 'aa', 1, 11),
(56, '2025-05-12 22:31:36', 'a', 1, 11),
(57, '2025-05-12 22:33:33', 'aaa', 0, 11),
(58, '2025-05-12 22:33:38', 'aaa', 1, 11),
(59, '2025-05-12 22:33:41', 'bbbb', 0, 11),
(60, '2025-05-13 00:08:48', 'Bookmarks', 0, 38),
(61, '2025-05-13 00:48:21', '1234 ', 1, 11),
(62, '2025-05-13 00:49:50', 'Bookmarks', 0, 39),
(63, '2025-05-13 00:55:33', 'list 1', 0, 39),
(64, '2025-05-13 00:55:38', 'a', 0, 39),
(65, '2025-05-13 00:55:44', 'y', 0, 39),
(66, '2025-05-13 00:55:48', 's', 0, 39),
(67, '2025-05-13 11:09:08', 'Bookmarks', 0, 40),
(68, '2025-05-13 13:05:11', 'Bookmarks', 0, 41),
(69, '2025-05-14 14:56:44', 'sss', 0, 41);

-- --------------------------------------------------------

--
-- Table structure for table `lists_articles`
--

CREATE TABLE `lists_articles` (
  `listId` int(11) NOT NULL,
  `articleId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lists_articles`
--

INSERT INTO `lists_articles` (`listId`, `articleId`) VALUES
(1, 3),
(1, 5),
(1, 8),
(2, 15),
(19, 5),
(47, 2),
(57, 1),
(59, 1),
(59, 2);

-- --------------------------------------------------------

--
-- Table structure for table `registeredusers`
--

CREATE TABLE `registeredusers` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(80) NOT NULL,
  `password` varchar(150) NOT NULL,
  `isDeleted` tinyint(1) NOT NULL DEFAULT 0,
  `joinDate` date NOT NULL DEFAULT current_timestamp(),
  `roleId` int(11) NOT NULL,
  `profilePicture` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registeredusers`
--

INSERT INTO `registeredusers` (`id`, `username`, `email`, `password`, `isDeleted`, `joinDate`, `roleId`, `profilePicture`) VALUES
(1, 'joesmith50', 'joe01@gmail.com', '$2y$10$uyVp/Iinq/luaE/c/KSX2eUFdVr4eY29o2furRiVcIbspo.TbHLbC', 0, '2025-05-03', 2, ''),
(2, 'jamesjohnson33', 'james02@gmail.com', '$2y$10$Q7N0h1v40hRISCnICmY4P.u3l4ZTchjowjDalZMJEOLfXpr592U8S', 0, '2025-05-03', 2, ''),
(3, 'Oliverwilliams84', 'oli@gmail.com', '$2y$10$VpuocpKeQC/gad7nR/Ao4els..M8vULHY7q4HUtS4sUSwIQL/Kppe', 0, '2025-05-03', 2, ''),
(4, 'oliviataylor841', 'olivia04@gmail.com', '$2y$10$oAMjdsLaC1OBpVag5FIFnO9j8/7FhjmDh/gVFKF71WxQZ9LifLY6C', 0, '2025-05-03', 2, ''),
(6, 'Sophiabrown52', 'Sophie06@gmail.com', '$2y$10$siEPZdja8fZyG3gLq.rjtuMs2NIl6uaZYz9oreMgEKb2XaZ3hM7le', 0, '2025-05-03', 2, ''),
(7, 'Ethanmiller74', 'ethan07@gmail.com', '$2y$10$252nQnEyAQJW8C6fOA73J.herI7ZgXQtPvJZp2Tlkh940klE.5L4S', 0, '2025-05-03', 2, ''),
(8, 'gracetom45', 'grace08@gmail.com', '$2y$10$jJ7iVrHnGmKlmibk666ipuy07UTdE2z39fW70CujRceCcj1tOuNl6', 0, '2025-05-03', 1, ''),
(9, 'willyjohnson89', 'willy09@gmail.com ', '$2y$10$KVEUp8wEUoWGstIV3tTSIuZ00IF7k/EiisIeJS313SyRhjNGCwtwS', 0, '2025-05-03', 2, ''),
(10, 'lilydavis44', 'lily10@gmail.com', '$2y$10$on/Sey8RAt6uugPz.potju7RI7JNucfA6DQzrm4Fa3kfix31ETeTK', 0, '2025-05-03', 2, ''),
(11, 'oa', 'test@t.tcs', '$2y$10$M0yw6n8DXLhV6VLQGtEM/.MaC4W3ELqW4YKrEKVPidIAPaq6bDzwG', 0, '2025-05-05', 1, '../assets/img/Screenshot 2024-04-28 210051.png'),
(12, 'oa2', 'oa2@gmail.com', '$2y$10$yyaGG2O3YKYTddHt0P6f8OobeWSHBqnFuU/n6J4vnoKRdHtro1huG', 0, '2025-05-05', 2, ''),
(13, 'aaaa', 'aa@aa.c', '$2y$10$D4PtcGtvqhVchjbp4gUDsebbTb.SnasBOpoGnQ8F9FahI76SLtGm2', 0, '2025-05-06', 3, ''),
(14, 'oaa', 'aaa@g', '$2y$10$TF0EbrjpJpEphS7eEr2SXebOa/ZTIyqkZedVSTua2/RxhBoENE06a', 0, '2025-05-06', 2, ''),
(15, 'ee', 'aa@aa.c', '$2y$10$5rk.wRKHol.Bm.FXEwH7GuH5e73m56sUp7.mdlT236mKSMHq7HvWy', 0, '2025-05-07', 2, ''),
(16, 'joker', 'j@j.c', '$2y$10$IUFbLBSXV0oZ6bhoAgjOKOS6XBAStv7cY1v497QzdQ5S1egxwyjFi', 0, '2025-05-07', 3, ''),
(17, 'jack', 'jj@jj', '$2y$10$Xfc4hYy1cpsTlTNBB9stMudZWUH4DIsZtYmvooVqw4SWAOaas52ee', 0, '2025-05-07', 2, ''),
(18, 'b', 'b@b.c', '$2y$10$INdWIqUueJ4YsSlmIWbDv.1evt8djUH7ox/vhTR8JaL5Jq4V7iFvW', 0, '2025-05-07', 3, ''),
(19, 'test', 't@t.c', '$2y$10$Ulal7gNzTDkjRz.DNPpkrOMDaR1kLlxg0ZXUTKnSUKU3CE/d0WQSm', 0, '2025-05-07', 3, ''),
(20, 'uu', 'u@u.u', '$2y$10$GtKfd31syqY/o/jRfQRHPevdTyG4Ak03iFczPXmDQ7OOlp98DsctK', 0, '2025-05-08', 3, ''),
(21, 'y', 'y@y.y', '$2y$10$1dK8T.dvCSqFTsBPP0s5V.lBk6gMrF1qXbXSY2y6ODv3BfJcmiRM6', 0, '2025-05-08', 3, ''),
(22, 'h', 'h@h.h', '$2y$10$knZSpbknvau1G26OIuxZ8uL0GmjW79VmmWe3pGYJ8etnYob7yt19u', 0, '2025-05-08', 2, ''),
(23, 'b', 'b@b.b', '$2y$10$8inyC/22JOy52U7TZNnwxeBX6BxSxqcjgLF5Cr2.FyTNL2btyUzIm', 0, '2025-05-08', 2, ''),
(24, 'q', 'h@h.h', '1234', 0, '2025-05-08', 2, ''),
(25, 'b', '0', '$2y$10$XnBKIBs3TF3zyjdRn1IXm..GspzaV6vpFd0angaO4EKACZMCO54NO', 1, '2025-05-08', 3, ''),
(26, 'x', 'x@x.x', '$2y$10$LM5z.2KKOdGFYQe.LP9r.eexIYFXj/g0Pb4Ri/75U4cLUE9libe2G', 1, '2025-05-08', 3, ''),
(27, 'w', 'w@w.w', '$2y$10$yuHdID67ZFv6YUsXb5YVheS2oBOHpl4StvPmQ011EQ6h8N.cT1OsS', 1, '2025-05-08', 3, ''),
(28, 'e', 'e@e.e', '$2y$10$/c/.FD5CTl49HtucPnK05essyTyS/.kKcKPBD6S4W3jo0eZciNOUq', 1, '2025-05-08', 3, ''),
(29, 'v', 'v@v.v', '$2y$10$n8NYsUmys2Xj23B268N7lu/bK/K9gaJ4t5U8G1nDDCJvzS7/.G21i', 1, '2025-05-08', 3, ''),
(30, 'o', 'o@o.o', '$2y$10$RwJl.V0VLW74e5XwsXZHL.jdn6/32alK9pe6IEhw3KBVrjXitczNK', 0, '2025-05-08', 2, ''),
(31, 'omar', 'omar@o.o', '$2y$10$rJoKidS56kuKoOIotm8n0.82ozhym/p/qLM5YlFrKke.7WqOtAZuy', 1, '2025-05-08', 3, ''),
(32, 'aaa', 'aaa@aaa.c', '$2y$10$4Wyg2H7EOKLhOG5NImorfuZUS7pbXaicXPVBjclBZrye3qBRBNVLu', 1, '2025-05-08', 3, ''),
(33, 'k', 'k@k.k', '$2y$10$A7.J8c44xyXwOEcPc8s2MeZczzrcaOczGk3FzTC5Gz9RpQaeRU0r.', 1, '2025-05-08', 2, ''),
(35, 'ui', 'ui@ui.ui', '$2y$10$/FxTWUQjyGNGaHYuwLFv1.Zf9WB9Bg6Coekbhbgxwl7OsFzpA0pcq', 0, '2025-05-12', 2, ''),
(36, 'oo', 'oo@o.o', '$2y$10$aGTG18japLQkjgkSEEZgY.ZyWhDUo9i1FA.U4cQZXKU/r0z/4OhkK', 1, '2025-05-12', 3, ''),
(37, 'qdas', 'q@q.q', '$2y$10$7no2pOoJtyUUJ0QfKD.qSezfTACLYx3g0C7nW2mNOVuj37c6qBaxO', 1, '2025-05-12', 3, ''),
(38, 'editor', 'e@e.e', '$2y$10$boG/zDAHSLQNRgPnNHqqpemeRDmg3qAf0MuZ.ruXrqCFSmsPMU6AC', 0, '2025-05-13', 2, ''),
(39, 'new', 'N@N.N', '$2y$10$pLUL0zwXieXY82DFfyKDOuwxq/LpcdGfce2i7EhQrQqeub7vVcMr6', 0, '2025-05-13', 3, ''),
(40, 'editor1', 'ee@ee.ee', '$2y$10$LubvRQnYvLcJbGnpXoQQvee2ycBOTWNc/fKzUGO5uKeHttwi9BFte', 0, '2025-05-13', 2, ''),
(41, 'new1', 'n@n.ncvscvcxzvsd', '$2y$10$W5xro0IXBCXg4riWRgt3/uEgG1nBj.eHC4YcMivbaPmwRJZyZJQ.W', 0, '2025-05-13', 3, '');

-- --------------------------------------------------------

--
-- Table structure for table `reportreasons`
--

CREATE TABLE `reportreasons` (
  `id` int(11) NOT NULL,
  `reason` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reportreasons`
--

INSERT INTO `reportreasons` (`id`, `reason`) VALUES
(1, 'Violent content'),
(2, 'False information'),
(3, 'Hateful content'),
(4, 'Spam');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `articleId` int(11) NOT NULL,
  `reportDate` datetime NOT NULL DEFAULT current_timestamp(),
  `reportReason` varchar(400) NOT NULL,
  `reportComment` varchar(1200) NOT NULL,
  `isDismissed` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`id`, `userId`, `articleId`, `reportDate`, `reportReason`, `reportComment`, `isDismissed`) VALUES
(27, 11, 2, '2025-05-12 23:00:33', 'Hateful content', '', 0),
(28, 11, 2, '2025-05-12 23:00:48', 'False information', '', 1),
(29, 16, 1, '2025-05-12 23:06:36', 'Hateful content', '', 1),
(30, 16, 1, '2025-05-12 23:07:04', 'Hateful content', '', 1),
(31, 18, 1, '2025-05-13 03:31:37', 'Hateful content', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`) VALUES
(1, 'Admin'),
(2, 'Editor'),
(3, 'Client');

-- --------------------------------------------------------

--
-- Table structure for table `searchhistory`
--

CREATE TABLE `searchhistory` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `searchTerm` varchar(300) NOT NULL,
  `searchTime` datetime NOT NULL DEFAULT current_timestamp(),
  `isDeleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `searchhistory`
--

INSERT INTO `searchhistory` (`id`, `userId`, `searchTerm`, `searchTime`, `isDeleted`) VALUES
(1, 11, 'ss', '2025-05-09 22:31:50', 0),
(2, 11, 'ss', '2025-05-09 22:32:02', 0),
(3, 11, 'ss', '2025-05-09 22:32:37', 0),
(4, 11, 'ha', '2025-05-09 22:34:32', 0),
(5, 11, 'ha', '2025-05-09 22:34:42', 0),
(7, 11, 'bb', '2025-05-09 22:36:25', 0),
(8, 11, 'bb', '2025-05-09 22:37:49', 0),
(9, 11, 'jj', '2025-05-10 18:38:54', 0),
(10, 11, 'f', '2025-05-10 18:38:58', 0),
(11, 11, 'jj', '2025-05-10 18:39:05', 0),
(12, 11, 'jj', '2025-05-10 18:39:07', 0),
(13, 11, 'w', '2025-05-10 22:11:03', 0),
(14, 11, 'ewrqw', '2025-05-10 22:11:11', 0),
(16, 11, 'the', '2025-05-10 22:11:14', 0),
(17, 11, 'art', '2025-05-12 14:48:54', 0),
(18, 16, 'artificial intelligence', '2025-05-12 18:26:16', 0),
(19, 11, 'The French Revolution', '2025-05-12 21:06:19', 0),
(21, 14, 'haha', '2025-05-13 03:17:59', 0),
(22, 14, 'Haha', '2025-05-13 03:18:23', 0),
(23, 14, 'Ha', '2025-05-13 03:18:44', 0),
(24, 11, '', '2025-05-13 03:59:09', 0),
(25, 11, '', '2025-05-13 03:59:16', 0),
(26, 11, '', '2025-05-13 03:59:22', 0),
(27, 11, 'sssss', '2025-05-13 04:02:11', 0),
(28, 11, 'A', '2025-05-13 04:02:16', 0),
(29, 11, 'A', '2025-05-13 04:02:24', 0),
(30, 11, 'A', '2025-05-13 04:02:31', 0),
(31, 11, 'Artif', '2025-05-13 04:02:40', 0),
(32, 11, 'Artif', '2025-05-13 04:02:46', 0),
(33, 11, 'Artif', '2025-05-13 04:03:13', 0),
(34, 11, 'Artif', '2025-05-13 04:03:15', 0),
(35, 11, 's', '2025-05-13 04:03:17', 0),
(36, 11, 's', '2025-05-13 04:03:27', 0),
(37, 41, 'the', '2025-05-13 13:06:49', 0),
(38, 41, 'The', '2025-05-14 14:57:09', 0),
(39, 41, 'arti', '2025-05-14 14:57:55', 0),
(40, 41, 'arti', '2025-05-14 14:58:10', 0),
(41, 41, 'arti', '2025-05-14 14:58:19', 0),
(42, 41, 'arti', '2025-05-14 14:58:25', 0),
(43, 41, 'arti', '2025-05-14 14:58:30', 0),
(44, 41, 'arti', '2025-05-14 14:58:37', 0),
(45, 41, 'arti', '2025-05-14 14:58:43', 0);

-- --------------------------------------------------------

--
-- Table structure for table `translations`
--

CREATE TABLE `translations` (
  `id` int(11) NOT NULL,
  `languageId` int(11) NOT NULL,
  `articleId` int(11) NOT NULL,
  `translatedTitle` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `translatedContent` varchar(20000) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `translations`
--

INSERT INTO `translations` (`id`, `languageId`, `articleId`, `translatedTitle`, `translatedContent`) VALUES
(1, 2, 1, 'La Révolution française', 'La Révolution française est un événement majeur de l’histoire mondiale qui débuta en 1789 et se termina en 1799. Elle bouleversa profondément l’ordre social et politique en France et eut des répercussions dans toute l’Europe et au-delà. Cette révolution prit naissance dans un contexte de crise économique, de profondes inégalités sociales, de mauvaise gestion politique, et sous l’influence des philosophes des Lumières qui prônaient la liberté, l’égalité et la fraternité.\n\nLa France, dirigée par le roi Louis XVI, faisait face à une dette colossale et à une société divisée en trois ordres : le clergé (Premier État), la noblesse (Deuxième État) et le Tiers État, composé de plus de 95 % de la population, mais dépourvu de pouvoir politique réel. La convocation des États généraux en mai 1789 marqua le début d’une confrontation politique majeure. Le Tiers État se déclara Assemblée nationale et se donna pour mission de rédiger une constitution.\n\nLa prise de la Bastille le 14 juillet 1789 devint un symbole fort du soulèvement populaire contre l’absolutisme. Dans les années suivantes, la monarchie fut abolie, les privilèges féodaux supprimés, et la Première République proclamée en 1792. Le roi Louis XVI et la reine Marie-Antoinette furent jugés et exécutés en 1793. Cependant, la Révolution entra dans une phase radicale et violente appelée la Terreur, dirigée par les Jacobins et Robespierre, au cours de laquelle des milliers de personnes furent guillotinées.\n\nLa Terreur prit fin avec l’exécution de Robespierre en 1794. En 1799, Napoléon Bonaparte prit le pouvoir par un coup d’État et mit fin au régime révolutionnaire. Malgré les violences et les bouleversements, la Révolution française marqua le début de l’ère moderne, influença la politique mondiale, et introduisit des idées fondamentales sur les droits de l’homme et la souveraineté du peuple.'),
(2, 3, 1, 'La Revolución Francesa', 'La Revolución Francesa fue un evento clave en la historia mundial que comenzó en 1789 y concluyó en 1799. Transformó radicalmente la estructura política y social de Francia, e influyó en numerosos movimientos políticos y sociales en Europa y el resto del mundo. Sus causas fueron múltiples: una crisis económica prolongada, la desigualdad entre las clases sociales, la corrupción de la monarquía, y las ideas ilustradas que promovían la libertad y los derechos del ciudadano.\n\nAntes de la revolución, la sociedad francesa estaba dividida en tres estados: el clero (Primer Estado), la nobleza (Segundo Estado), y el Tercer Estado, que incluía a la mayoría del pueblo pero carecía de representación política. En mayo de 1789, el rey Luis XVI convocó a los Estados Generales, pero el Tercer Estado se declaró Asamblea Nacional y exigió una nueva constitución. Este acto marcó el inicio de un proceso revolucionario imparable.\n\nEl 14 de julio de 1789, el asalto a la Bastilla se convirtió en un símbolo de la rebelión del pueblo contra la tiranía. En los años siguientes, se abolieron los privilegios feudales, se proclamó la república en 1792, y se ejecutó al rey Luis XVI y a la reina María Antonieta en 1793. No obstante, la revolución entró en una etapa de gran violencia: el Reinado del Terror, liderado por Robespierre y los jacobinos, durante el cual miles de personas fueron guillotinadas por sospechas de traición.\n\nLa Revolución concluyó con el ascenso de Napoleón Bonaparte al poder tras el golpe de Estado del 18 de Brumario en 1799. A pesar del caos y el derramamiento de sangre, la Revolución Francesa dejó un legado duradero de libertad, igualdad, ciudadanía y participación política, inspirando reformas en muchos países del mundo.'),
(3, 2, 2, 'La Seconde Guerre mondiale', 'La Seconde Guerre mondiale fut le conflit le plus vaste et le plus meurtrier de l’histoire humaine, s’étendant de 1939 à 1945 et impliquant plus de 100 millions de personnes à travers plus de 30 pays. Elle débuta le 1er septembre 1939, lorsque l’Allemagne nazie, dirigée par Adolf Hitler, envahit la Pologne. Cette agression provoqua la déclaration de guerre du Royaume-Uni et de la France à l’Allemagne.\r\n\r\nLe conflit opposa principalement les puissances de l’Axe (Allemagne, Italie, Japon) aux Alliés (Royaume-Uni, Union soviétique, États-Unis, Chine, entre autres). En Europe, l’Allemagne utilisa des tactiques de guerre éclair (Blitzkrieg) pour conquérir rapidement de nombreux territoires. En Asie, le Japon poursuivit une expansion brutale, annexant de vastes régions.\r\n\r\nEn 1941, deux événements majeurs changèrent le cours de la guerre : l’invasion de l’Union soviétique par l’Allemagne et l’attaque japonaise sur la base navale américaine de Pearl Harbor, qui entraîna l’entrée des États-Unis dans le conflit. De grandes batailles suivirent : Stalingrad, El Alamein, le débarquement de Normandie en juin 1944.\r\n\r\nL’Holocauste fut une des tragédies les plus atroces de cette période. Six millions de Juifs furent exterminés par le régime nazi, ainsi que des millions d’autres victimes, dont les Roms, les handicapés et les opposants politiques. La guerre se caractérisa aussi par des bombardements massifs qui détruisirent de nombreuses villes.\r\n\r\nEn Europe, la guerre prit fin en mai 1945 avec la reddition de l’Allemagne, après le suicide d’Hitler. Dans le Pacifique, elle se termina après les bombardements atomiques d’Hiroshima et Nagasaki en août 1945, qui poussèrent le Japon à capituler. Les conséquences furent immenses : création de l’Organisation des Nations Unies, début de la guerre froide, division de l’Allemagne, et reconstruction mondiale.\r\n\r\nLa Seconde Guerre mondiale transforma profondément l’ordre mondial et reste un moment clé du XXe siècle.\r\n\r\n'),
(4, 3, 2, 'La Segunda Guerra Mundial', 'La Segunda Guerra Mundial fue el conflicto más devastador de la historia, duró de 1939 a 1945 y movilizó a más de 100 millones de personas en más de 30 países. Comenzó el 1 de septiembre de 1939, cuando la Alemania nazi, bajo el liderazgo de Adolf Hitler, invadió Polonia. Esto llevó a que el Reino Unido y Francia declararan la guerra a Alemania, iniciando una contienda global.\r\n\r\nEl conflicto se dividió entre las Potencias del Eje (Alemania, Italia, Japón) y los Aliados (Reino Unido, Unión Soviética, Estados Unidos, China, entre otros). Alemania utilizó tácticas de guerra relámpago (Blitzkrieg) para conquistar rápidamente gran parte de Europa, mientras Japón se expandía agresivamente en Asia y el Pacífico.\r\n\r\nEn 1941, Alemania invadió la Unión Soviética y Japón atacó Pearl Harbor, lo que motivó la entrada formal de Estados Unidos en la guerra. A partir de entonces, se libraron batallas cruciales como Stalingrado, El Alamein y el desembarco aliado en Normandía (Día D) en 1944.\r\n\r\nUno de los episodios más horrendos fue el Holocausto, en el que el régimen nazi asesinó sistemáticamente a seis millones de judíos, junto con millones de otras víctimas, como personas con discapacidades, minorías étnicas y opositores políticos. Además, la guerra involucró estrategias de destrucción total, incluyendo bombardeos aéreos masivos.\r\n\r\nLa guerra en Europa terminó en mayo de 1945 tras la rendición alemana y el suicidio de Hitler. En el Pacífico, culminó luego del lanzamiento de bombas atómicas sobre Hiroshima y Nagasaki por parte de Estados Unidos en agosto de 1945, lo que forzó la rendición japonesa.\r\n\r\nEl conflicto dejó consecuencias duraderas: la fundación de las Naciones Unidas, el inicio de la Guerra Fría, la división de Alemania, y una extensa reconstrucción global. La Segunda Guerra Mundial alteró el rumbo de la humanidad y definió gran parte del siglo XX.\r\n\r\n'),
(5, 2, 3, 'La guerre de Sécession', 'La guerre de Sécession, qui se déroula de 1861 à 1865, fut l’un des événements les plus marquants de l’histoire des États-Unis. Elle opposa les États du Nord (l’Union) aux États du Sud (la Confédération), principalement sur des questions liées aux droits des États, aux différences économiques, et surtout à l’esclavage.\r\n\r\nAprès l’élection d’Abraham Lincoln en 1860, onze États du Sud firent sécession, craignant que le nouveau président ne mette fin à l’esclavage. Ils fondèrent les États confédérés d’Amérique, dirigés par Jefferson Davis. La guerre débuta officiellement en avril 1861 avec l’attaque de Fort Sumter en Caroline du Sud par les forces sudistes.\r\n\r\nL’Union bénéficiait d’une supériorité industrielle et démographique, mais la Confédération montra une forte détermination. Des batailles majeures eurent lieu à Antietam, Gettysburg, Shiloh et Vicksburg. Le conflit fut aussi marqué par des innovations militaires : cuirassés, tranchées, et chemins de fer utilisés pour transporter les troupes.\r\n\r\nUn tournant majeur fut la Proclamation d’émancipation, signée par Lincoln en 1863, qui libérait les esclaves dans les territoires rebelles. Ce geste donna une dimension morale au conflit et réduisit les chances que des nations européennes soutiennent la Confédération.\r\n\r\nEn avril 1865, la guerre prit fin lorsque le général Robert E. Lee se rendit au général Ulysses S. Grant à Appomattox, en Virginie. Peu après, Lincoln fut assassiné par John Wilkes Booth, un partisan confédéré, ce qui provoqua une grande émotion dans le pays.\r\n\r\nLe conflit fit plus de 600 000 morts et laissa le Sud en ruine. La période de la Reconstruction visa à reconstruire les États du Sud et à intégrer les anciens esclaves dans la société américaine. Si la guerre permit l’abolition de l’esclavage et la sauvegarde de l’Union, elle laissa des cicatrices profondes, notamment en matière de relations raciales et de divisions régionales.'),
(6, 3, 3, 'La Guerra Civil Estadounidense', 'La Guerra Civil de los Estados Unidos, librada entre 1861 y 1865, fue uno de los conflictos más importantes en la historia del país. Enfrentó a los estados del Norte (la Unión) contra los estados del Sur (la Confederación), y sus principales causas fueron la esclavitud, los derechos estatales y las diferencias económicas y sociales entre ambas regiones.\r\n\r\nTras la elección de Abraham Lincoln en 1860, once estados del sur decidieron separarse de la Unión por temor a que su presidencia pusiera fin a la esclavitud. Estos estados formaron los Estados Confederados de América, liderados por Jefferson Davis. El primer enfrentamiento ocurrió en abril de 1861 en Fort Sumter, Carolina del Sur.\r\n\r\nAunque el Norte tenía una ventaja clara en población, industria y transporte, el Sur luchó con gran determinación. Se libraron batallas claves como Antietam, Gettysburg, Shiloh y Vicksburg. La guerra introdujo nuevas tecnologías militares, como barcos blindados, líneas de tren para transporte de tropas y tácticas de guerra de trincheras.\r\n\r\nUn evento fundamental fue la Proclamación de Emancipación en 1863, por la cual Lincoln declaró libres a los esclavos en los territorios controlados por la Confederación. Esto dio un enfoque moral al conflicto y desalentó el apoyo de potencias extranjeras a los rebeldes.\r\n\r\nLa guerra terminó en abril de 1865, cuando el general confederado Robert E. Lee se rindió ante el general unionista Ulysses S. Grant en Appomattox. Días después, Lincoln fue asesinado por John Wilkes Booth, un simpatizante sureño, lo que sacudió al país.\r\n\r\nLa Guerra Civil dejó más de 600,000 muertos y una región sur devastada. La era de la Reconstrucción intentó reparar la nación y garantizar los derechos de los afroamericanos. Si bien se abolió la esclavitud y se preservó la unión del país, las secuelas del conflicto perduraron durante décadas en forma de racismo, desigualdad y divisiones políticas.'),
(7, 2, 4, 'La théorie de la relativité', 'La théorie de la relativité, développée par Albert Einstein au début du XXe siècle, a bouleversé la physique et notre compréhension de l’espace, du temps et de la gravité. Elle se compose de deux parties principales : la relativité restreinte et la relativité générale.\r\n\r\nLa relativité restreinte, publiée en 1905, stipule que les lois de la physique sont les mêmes pour tous les observateurs en mouvement rectiligne uniforme. Elle affirme également que la vitesse de la lumière dans le vide est constante, peu importe le mouvement de l’observateur. Cela conduit à des phénomènes étonnants comme la dilatation du temps (le temps passe plus lentement pour les objets en mouvement) et la contraction des longueurs. La célèbre équation E=mc², qui établit l’équivalence entre la masse et l’énergie, découle de cette théorie.\r\n\r\nLa relativité générale, publiée en 1915, étend la relativité restreinte en incluant la gravitation. Einstein y décrit la gravité non pas comme une force, mais comme la courbure de l’espace-temps provoquée par la masse et l’énergie. Les objets massifs, comme les planètes ou les étoiles, déforment l’espace autour d’eux, influençant la trajectoire d’autres objets.\r\n\r\nCette théorie a été vérifiée à de nombreuses reprises. Par exemple, elle a permis de prédire la déviation de la lumière par le Soleil, confirmée lors de l’éclipse solaire de 1919. Elle est également à la base de la cosmologie moderne, permettant de comprendre les trous noirs, l’expansion de l’univers et les ondes gravitationnelles, détectées pour la première fois en 2015.\r\n\r\nLa théorie de la relativité d’Einstein reste une pierre angulaire de la science moderne, ouvrant la voie à de nombreuses découvertes en physique et dans les technologies avancées'),
(8, 3, 4, 'La teoría de la relatividad', 'La teoría de la relatividad, formulada por Albert Einstein a principios del siglo XX, transformó radicalmente la física y nuestra comprensión del espacio, el tiempo y la gravedad. Consta de dos partes principales: la relatividad especial y la relatividad general.\r\n\r\nLa relatividad especial, publicada en 1905, establece que las leyes de la física son las mismas para todos los observadores que no estén acelerando. También postula que la velocidad de la luz en el vacío es constante para todos los observadores, independientemente de su movimiento. De esto se derivan fenómenos sorprendentes como la dilatación del tiempo (el tiempo transcurre más lento para los objetos en movimiento) y la contracción de longitudes. La famosa ecuación E=mc², que muestra la equivalencia entre masa y energía, proviene de esta teoría.\r\n\r\nLa relatividad general, presentada en 1915, amplía la relatividad especial para incluir la aceleración y la gravedad. Einstein propuso que la gravedad no es una fuerza entre objetos, sino el resultado de la curvatura del espacio-tiempo causada por la masa y la energía. Objetos masivos como planetas y estrellas deforman el espacio a su alrededor, afectando el movimiento de otros cuerpos.\r\n\r\nEsta teoría ha sido confirmada por numerosos experimentos. Por ejemplo, predijo la desviación de la luz alrededor del Sol, observada durante un eclipse solar en 1919. También ha sido fundamental para el desarrollo de la cosmología moderna, permitiendo comprender los agujeros negros, la expansión del universo y las ondas gravitacionales, detectadas por primera vez en 2015.\r\n\r\nLa teoría de la relatividad sigue siendo una de las mayores contribuciones científicas de la humanidad, transformando nuestra visión del universo y sentando las bases de nuevas tecnologías.'),
(9, 2, 5, 'L’intelligence artificielle', 'L’intelligence artificielle (IA) désigne la capacité des machines et des systèmes informatiques à accomplir des tâches qui nécessitent normalement l’intelligence humaine. Cela inclut l’apprentissage, le raisonnement, la résolution de problèmes, la perception, la compréhension du langage et la prise de décision. L’IA est passée d’un concept théorique à une technologie concrète qui transforme de nombreux aspects de notre vie quotidienne.\r\n\r\nLes débuts de l’IA remontent au milieu du XXe siècle, avec des pionniers comme Alan Turing et John McCarthy qui ont posé les bases de la discipline. Grâce aux progrès informatiques, aux algorithmes et à la disponibilité des données, l’IA a évolué de simples systèmes basés sur des règles vers des modèles capables d’apprendre à partir de l’expérience, ce que l’on appelle aujourd’hui l’apprentissage automatique.\r\n\r\nL’apprentissage automatique, et en particulier l’apprentissage profond, est à l’origine de nombreuses avancées récentes. Il permet aux machines d’analyser de vastes ensembles de données pour en extraire des modèles et faire des prédictions. Cela a rendu possibles des applications telles que la reconnaissance vocale, la vision par ordinateur, le traitement du langage naturel et les véhicules autonomes. L’IA alimente également les assistants vocaux comme Siri et Alexa, les recommandations de contenus en ligne, la détection de fraudes bancaires et les diagnostics médicaux assistés par ordinateur.\r\n\r\nUne application remarquable de l’IA est celle des modèles génératifs, capables de créer du contenu original (textes, images, musiques). Des outils comme ChatGPT ou les générateurs d’images illustrent le potentiel créatif et productif de cette technologie.\r\n\r\nCependant, l’IA soulève aussi des enjeux éthiques et sociaux : biais algorithmiques, respect de la vie privée, automatisation de l’emploi, et risques d’usages malveillants. Il est essentiel de développer une IA responsable, transparente et équitable.\r\n\r\nL’avenir de l’intelligence artificielle dépendra non seulement des avancées technologiques, mais aussi des choix sociétaux et politiques concernant son intégration dans nos vies.\r\n\r\n'),
(10, 3, 5, 'La inteligencia artificial', 'La inteligencia artificial (IA) se refiere a la capacidad de las máquinas y sistemas informáticos para realizar tareas que normalmente requieren inteligencia humana, como aprender, razonar, resolver problemas, percibir el entorno, comprender el lenguaje y tomar decisiones. La IA ha pasado de ser una teoría a convertirse en una herramienta clave en la vida moderna.\r\n\r\nEl campo de la IA comenzó a mediados del siglo XX, con pioneros como Alan Turing y John McCarthy que establecieron los fundamentos teóricos. Con el tiempo, el aumento del poder de cómputo, los nuevos algoritmos y la abundancia de datos permitieron desarrollar sistemas que aprenden de la experiencia, lo que hoy conocemos como aprendizaje automático (machine learning).\r\n\r\nEl aprendizaje automático, y especialmente el aprendizaje profundo (deep learning), ha impulsado la actual revolución de la IA. Gracias a ello, hoy existen sistemas capaces de reconocer voz, interpretar imágenes, comprender texto y conducir vehículos de forma autónoma. La IA está presente en asistentes digitales como Siri y Alexa, en los sistemas de recomendación de contenido, en la detección de fraudes financieros y en el diagnóstico médico asistido por computadora.\r\n\r\nUna aplicación destacada es la de los modelos generativos, que pueden crear texto, imágenes o música. Herramientas como ChatGPT y generadores de imágenes muestran cómo la IA puede potenciar la creatividad humana.\r\n\r\nNo obstante, también surgen preocupaciones éticas y sociales: sesgos algorítmicos, privacidad de los datos, pérdida de empleos por automatización y posibles usos indebidos. Por eso, muchos expertos piden desarrollar una IA ética, responsable y transparente.\r\n\r\nEl futuro de la inteligencia artificial no solo dependerá del avance técnico, sino también de cómo la humanidad decida integrarla y regularla en la sociedad.'),
(11, 2, 6, 'L’exploration spatiale', 'L’exploration spatiale est l’étude de l’espace extra-atmosphérique à l’aide de technologies, de télescopes, et de vaisseaux spatiaux. Elle incarne l’une des entreprises les plus ambitieuses de l’humanité, motivée par la curiosité, la recherche scientifique et le désir de mieux comprendre notre univers.\r\n\r\nL’aventure a débuté en 1957 avec le lancement de Spoutnik 1 par l’Union soviétique, premier objet construit par l’homme à orbiter autour de la Terre. Cet événement a déclenché la course à l’espace, principalement entre les États-Unis et l’URSS pendant la guerre froide. Cette période a vu des exploits majeurs comme le premier vol spatial habité par Youri Gagarine en 1961, et les premiers pas de l’homme sur la Lune lors de la mission Apollo 11 en 1969 avec Neil Armstrong et Buzz Aldrin.\r\n\r\nDepuis, l’exploration spatiale s’est mondialisée. La création de la Station spatiale internationale (ISS) à la fin des années 1990 a rassemblé des scientifiques et astronautes de nombreux pays, facilitant la recherche à long terme en apesanteur et la coopération internationale.\r\n\r\nLes missions robotiques ont profondément enrichi nos connaissances du système solaire. Des sondes comme Voyager, Cassini ou New Horizons ont exploré des planètes éloignées, tandis que des rovers comme Curiosity et Perseverance ont analysé la surface de Mars à la recherche de traces de vie passée. Des télescopes comme Hubble et James Webb permettent aujourd’hui d’observer les confins de l’univers.\r\n\r\nDes entreprises privées telles que SpaceX, Blue Origin et Rocket Lab ont bouleversé l’industrie spatiale en rendant les lancements plus économiques et réutilisables. Cette nouvelle ère ouvre la voie à des missions vers la Lune, Mars, et peut-être un jour au tourisme spatial.\r\n\r\nMalgré les défis – coût élevé, durée des voyages, environnement hostile – l’exploration spatiale stimule l’innovation dans des domaines comme les matériaux, les télécommunications, la navigation et la médecine.\r\n\r\nMais surtout, elle illustre la quête humaine permanente de découverte, inspirant les générations présentes et futures à repousser les limites du possible.'),
(12, 3, 6, 'La exploración espacial', 'La exploración espacial es el estudio del espacio exterior mediante telescopios, sondas, satélites y naves espaciales. Representa una de las mayores hazañas científicas y tecnológicas de la humanidad, impulsada por el deseo de descubrir, aprender y comprender nuestro lugar en el universo.\r\n\r\nTodo comenzó en 1957, cuando la Unión Soviética lanzó el Sputnik 1, el primer satélite artificial en orbitar la Tierra. Este hecho marcó el inicio de la carrera espacial, especialmente entre Estados Unidos y la URSS durante la Guerra Fría. Entre sus logros más importantes se encuentran el primer ser humano en el espacio—Yuri Gagarin en 1961—y la llegada del hombre a la Luna en 1969 durante la misión Apolo 11, con Neil Armstrong y Buzz Aldrin.\r\n\r\nPosteriormente, la exploración espacial se convirtió en una labor colaborativa. La creación de la Estación Espacial Internacional (EEI) en los años 90 unió a múltiples países para llevar a cabo investigaciones científicas en un entorno de microgravedad.\r\n\r\nLas misiones robóticas han cambiado nuestra visión del sistema solar. Las sondas Voyager, Cassini y New Horizons han visitado planetas distantes, y los rovers Curiosity y Perseverance han explorado Marte en busca de señales de vida pasada. Telescopios como Hubble y James Webb nos permiten observar el universo en escalas de tiempo y distancia inimaginables.\r\n\r\nEn años recientes, empresas privadas como SpaceX, Blue Origin y Rocket Lab han transformado el acceso al espacio, haciéndolo más económico y reutilizable. Esto abre nuevas posibilidades para el regreso a la Luna, la exploración de Marte y el futuro del turismo espacial.\r\n\r\nAunque presenta desafíos como los costos elevados y las condiciones extremas, la exploración del espacio ha generado avances tecnológicos que también benefician a la vida en la Tierra.\r\n\r\nEn última instancia, explorar el espacio simboliza nuestra aspiración colectiva de ir más allá de lo conocido, empujando los límites del conocimiento y la imaginación.'),
(13, 2, 7, 'La forêt amazonienne', 'La forêt amazonienne, souvent surnommée les « poumons de la Terre », est la plus grande forêt tropicale du monde. Elle s’étend sur environ 5,5 millions de kilomètres carrés à travers neuf pays d’Amérique du Sud. Bien que la majorité de sa superficie se trouve au Brésil, elle s’étend aussi au Pérou, en Colombie, au Venezuela, en Équateur, en Bolivie, au Guyana, au Suriname et en Guyane française.\r\n\r\nCette immense forêt abrite le fleuve Amazone, l’un des plus longs et des plus puissants du monde. Elle abrite une biodiversité incroyable : plus de 40 000 espèces de plantes, 1 300 espèces d’oiseaux, 430 espèces de mammifères et environ 2,5 millions d’espèces d’insectes. C’est l’écosystème le plus riche en biodiversité de la planète.\r\n\r\nLa forêt amazonienne joue un rôle vital dans la régulation du climat mondial. Ses arbres absorbent d’importantes quantités de dioxyde de carbone et produisent de l’oxygène, contribuant ainsi à atténuer les effets du changement climatique. Son immense canopée influence également les régimes de précipitations, bien au-delà de l’Amérique du Sud.\r\n\r\nLes peuples autochtones vivent dans la forêt amazonienne depuis des millénaires. Ils possèdent une connaissance précieuse de la nature et maintiennent un mode de vie durable. Pourtant, ils sont souvent menacés par l’exploitation des terres, la déforestation et les conflits environnementaux.\r\n\r\nLa déforestation, due à l’exploitation forestière, l’agriculture, les mines et la construction d’infrastructures, représente une menace majeure. Elle entraîne la perte d’habitats, la disparition d’espèces et une augmentation des émissions de gaz à effet de serre.\r\n\r\nProtéger l’Amazonie est une responsabilité mondiale. La coopération internationale, le développement durable et le respect des droits des peuples autochtones sont essentiels pour préserver cet écosystème irremplaçable.\r\n\r\n'),
(14, 3, 7, 'La selva amazónica', 'La selva amazónica, conocida como los \"pulmones del planeta\", es la mayor selva tropical del mundo. Cubre aproximadamente 5.5 millones de kilómetros cuadrados y se extiende por nueve países sudamericanos, con la mayor parte situada en Brasil. También se encuentra en Perú, Colombia, Venezuela, Ecuador, Bolivia, Guyana, Surinam y la Guayana Francesa.\r\n\r\nEste ecosistema alberga al río Amazonas, uno de los ríos más largos y caudalosos del planeta. La región es el hogar de una biodiversidad impresionante: más de 40,000 especies de plantas, 1,300 especies de aves, 430 de mamíferos y alrededor de 2.5 millones de especies de insectos. Es el lugar con mayor biodiversidad del mundo.\r\n\r\nLa Amazonía desempeña un papel esencial en la regulación del clima global. Sus árboles absorben grandes cantidades de dióxido de carbono y liberan oxígeno, ayudando a mitigar el cambio climático. Además, su dosel denso influye en los patrones de lluvia más allá del continente sudamericano.\r\n\r\nLos pueblos indígenas han habitado la Amazonía durante miles de años, viviendo en armonía con la naturaleza y preservando un vasto conocimiento ancestral. Sin embargo, enfrentan crecientes amenazas debido a la explotación de recursos, la deforestación y los conflictos territoriales.\r\n\r\nHoy en día, la selva amazónica está gravemente amenazada por la tala ilegal, la minería, la expansión agrícola y los proyectos de infraestructura. La deforestación ha aumentado dramáticamente, afectando la biodiversidad y contribuyendo al calentamiento global.\r\n\r\nProteger la Amazonía es una tarea de alcance global. Se necesita cooperación internacional, prácticas sostenibles y el reconocimiento de los derechos de los pueblos indígenas para asegurar la conservación de este tesoro natural para las generaciones futuras.\r\n\r\n'),
(15, 2, 8, 'Le mont Everest', 'Le mont Everest, le plus haut sommet de la Terre, culmine à 8 848,86 mètres d’altitude. Il fait partie de la chaîne de l’Himalaya et se trouve à la frontière entre le Népal et la région autonome du Tibet, en Chine. Appelé Sagarmatha en népalais et Chomolungma en tibétain, il est sacré pour les populations locales.\r\n\r\nLe sommet fut identifié comme le point le plus élevé du monde en 1856 par la Grande Enquête Trigonométrique de l’Inde. Il fut nommé en l’honneur de Sir George Everest, ancien arpenteur général britannique. Au fil du temps, l’Everest est devenu un symbole de détermination et d’exploit humain.\r\n\r\nLa première ascension réussie a eu lieu le 29 mai 1953 par Sir Edmund Hillary, originaire de Nouvelle-Zélande, et Tenzing Norgay, un Sherpa du Népal. Leur expédition historique marqua le monde de l’alpinisme et suscita l’admiration internationale.\r\n\r\nGravir l’Everest représente un défi extrême. Les conditions climatiques rudes, le manque d’oxygène, les crevasses, les avalanches et la \"zone de la mort\" au-delà de 8 000 mètres rendent l’ascension périlleuse. Une acclimatation progressive, du matériel adapté et le soutien de guides Sherpas expérimentés sont essentiels.\r\n\r\nChaque année, des centaines d’alpinistes tentent l’ascension. Toutefois, cette fréquentation croissante soulève des préoccupations environnementales et éthiques : déchets, surpopulation, et pertes humaines. Des mesures de régulation, de nettoyage et de sensibilisation sont désormais mises en place.\r\n\r\nLe mont Everest est également un observatoire naturel du changement climatique. La fonte des glaciers, le recul des neiges et l’augmentation des risques de glissements de terrain en sont les symptômes visibles. Son étude offre des données précieuses sur l’évolution de l’environnement mondial.\r\n\r\nÀ la fois merveille géographique et symbole de l’ambition humaine, l’Everest rappelle notre lien profond avec la nature et notre devoir de la préserver.'),
(16, 3, 8, 'El Monte Everest', 'El Monte Everest, la cima más alta del planeta, alcanza una altitud de 8,848.86 metros sobre el nivel del mar. Se encuentra en la cordillera del Himalaya, en la frontera entre Nepal y la Región Autónoma del Tíbet en China. Es conocido como Sagarmatha en nepalí y Chomolungma en tibetano, y tiene un profundo significado espiritual para los pueblos locales.\r\n\r\nFue identificado como el punto más alto del mundo en 1856 por la Gran Encuesta Trigonométrica de la India, y recibió su nombre en honor a Sir George Everest, un topógrafo británico. Desde entonces, ha simbolizado el espíritu de superación y aventura de la humanidad.\r\n\r\nLa primera ascensión exitosa tuvo lugar el 29 de mayo de 1953 por Sir Edmund Hillary de Nueva Zelanda y Tenzing Norgay, un sherpa nepalí. Esta hazaña marcó un hito en la historia del alpinismo y atrajo la atención internacional.\r\n\r\nEscalar el Everest es una proeza extrema. El clima hostil, la escasez de oxígeno, las grietas profundas, las avalanchas y la llamada “zona de la muerte” por encima de los 8,000 metros hacen que la ascensión sea muy peligrosa. La aclimatación adecuada, el equipo especializado y la ayuda de los sherpas son esenciales.\r\n\r\nA pesar de los riesgos, cientos de personas intentan escalarlo cada año. No obstante, la popularidad ha traído problemas ambientales: basura, masificación y muertes. Se están implementando regulaciones más estrictas, campañas de limpieza y prácticas sostenibles.\r\n\r\nEl Everest también es un importante indicador del cambio climático. El derretimiento de los glaciares, los cambios en las líneas de nieve y los deslizamientos de tierra son señales alarmantes. Su estudio aporta datos vitales sobre la salud del planeta.\r\n\r\nEl Monte Everest sigue siendo un ícono geográfico y un poderoso símbolo del deseo humano de alcanzar lo imposible, al tiempo que nos recuerda la necesidad de proteger nuestro entorno natural.'),
(17, 2, 9, 'La Grande Barrière de corail', 'La Grande Barrière de corail est le plus grand système corallien du monde. Elle s’étend sur plus de 2 300 kilomètres le long de la côte nord-est de l’Australie. Elle comprend plus de 2 900 récifs individuels et 900 îles, couvrant une superficie d’environ 344 400 kilomètres carrés dans la mer de Corail. Sa taille est telle qu’elle est visible depuis l’espace.\r\n\r\nCet écosystème marin abrite une biodiversité exceptionnelle. On y trouve plus de 1 500 espèces de poissons, 400 espèces de coraux, 4 000 espèces de mollusques, ainsi que de nombreux oiseaux marins, tortues et mammifères marins. C’est l’un des environnements les plus complexes et les plus riches de la planète.\r\n\r\nLa Grande Barrière a une importance écologique, économique et culturelle immense. Elle soutient le tourisme, la pêche et les moyens de subsistance des peuples autochtones australiens qui vivent en harmonie avec cet environnement depuis des millénaires. Elle est classée au patrimoine mondial de l’UNESCO depuis 1981.\r\n\r\nCependant, ce trésor naturel est gravement menacé. Le réchauffement climatique provoque des épisodes de blanchissement massif des coraux, menaçant la survie de l’écosystème. La pollution agricole, le développement côtier et la surpêche contribuent également à sa dégradation.\r\n\r\nDes initiatives sont mises en place pour protéger et restaurer la barrière. Des zones marines protégées, des programmes de surveillance et la recherche scientifique cherchent à comprendre les changements et à proposer des solutions. La participation des communautés locales est essentielle pour garantir sa préservation.\r\n\r\nL’avenir de la Grande Barrière dépend des actions menées à l’échelle mondiale pour lutter contre le changement climatique et protéger les océans. Elle incarne à la fois la beauté et la fragilité du monde marin, et nous engage à agir pour sa sauvegarde.'),
(18, 3, 9, 'La Gran Barrera de Coral', 'La Gran Barrera de Coral es el sistema de arrecifes de coral más grande del mundo, con más de 2,300 kilómetros de longitud frente a la costa noreste de Australia. Está compuesta por más de 2,900 arrecifes individuales y 900 islas, abarcando un área de unos 344,400 kilómetros cuadrados en el mar del Coral. Su magnitud es tal que puede verse desde el espacio.\r\n\r\nEste ecosistema marino alberga una biodiversidad impresionante. Más de 1,500 especies de peces, 400 tipos de corales, 4,000 especies de moluscos, así como aves marinas, tortugas y mamíferos marinos habitan en este entorno. Es uno de los ecosistemas más complejos y ricos del planeta.\r\n\r\nLa Gran Barrera tiene un valor ecológico, económico y cultural inmenso. Es una fuente vital de turismo, pesca y sustento para los pueblos indígenas australianos que han convivido con este entorno durante miles de años. En 1981 fue declarada Patrimonio de la Humanidad por la UNESCO.\r\n\r\nPero este tesoro natural está en grave peligro. El aumento de la temperatura del mar ha provocado eventos masivos de blanqueamiento de corales. La contaminación agrícola, el desarrollo costero y la sobrepesca también han afectado negativamente al ecosistema.\r\n\r\nSe están llevando a cabo esfuerzos para proteger y restaurar la barrera. Las áreas marinas protegidas, los programas de monitoreo y la investigación científica buscan comprender estos cambios y encontrar soluciones. La participación comunitaria y las prácticas sostenibles son fundamentales para su conservación.\r\n\r\nEl futuro de la Gran Barrera de Coral depende de la acción global frente al cambio climático y la protección de los océanos. Este monumento viviente de la naturaleza es un recordatorio del deber colectivo de preservar los ecosistemas marinos del planeta.'),
(19, 2, 10, 'La Renaissance', 'La Renaissance est une période de renouveau culturel, artistique, intellectuel et scientifique qui commence en Italie au XIVe siècle avant de se diffuser dans toute l’Europe. Le mot « Renaissance », qui signifie « renaissance » en français, exprime le retour aux idéaux classiques de la Grèce et de Rome antiques, après les siècles du Moyen Âge.\r\n\r\nCette époque bouleverse la manière dont les êtres humains se perçoivent et envisagent le monde. L’humanisme, courant dominant de la Renaissance, met en valeur la raison, la dignité humaine et les capacités individuelles. Des penseurs comme Pétrarque et Érasme prônent l’étude des textes anciens et la réflexion critique, donnant naissance à une floraison d’œuvres littéraires, scientifiques et artistiques.\r\n\r\nLa Renaissance voit émerger des génies tels que Léonard de Vinci, artiste, ingénieur et scientifique aux talents multiples. Ses œuvres, La Cène et La Joconde, comptent parmi les plus célèbres de l’histoire de l’art. Michel-Ange, quant à lui, sublime l’art de la sculpture et de la peinture avec David et la fresque de la chapelle Sixtine.\r\n\r\nL’invention de l’imprimerie par Johannes Gutenberg vers 1440 bouleverse la diffusion du savoir. Les livres deviennent plus accessibles, favorisant l’alphabétisation et l’échange d’idées à travers l’Europe.\r\n\r\nL’architecture de la Renaissance se caractérise par l’harmonie, la symétrie et l’inspiration gréco-romaine, comme en témoignent les dômes et colonnes des édifices. Des villes comme Florence, Rome et Venise deviennent des centres de mécénat et d’épanouissement artistique, soutenues par des familles puissantes telles que les Médicis.\r\n\r\nLa Renaissance jette les bases de la pensée moderne occidentale. Elle valorise l’innovation, la curiosité et le progrès, préparant le terrain pour les Lumières et les révolutions scientifiques. Elle reste à jamais un âge d’or de la créativité humaine et de la culture européenne.\r\n\r\n'),
(20, 3, 10, 'El Renacimiento', 'El Renacimiento fue un importante movimiento de renovación cultural, artística, científica e intelectual que surgió en Italia en el siglo XIV y se extendió por toda Europa. El término “Renacimiento” proviene del francés y significa “renacer”, reflejando el redescubrimiento del conocimiento clásico de Grecia y Roma tras la Edad Media.\r\n\r\nEste periodo transformó profundamente la visión del ser humano y del mundo. El humanismo, corriente central del Renacimiento, exaltaba la razón, la dignidad humana y el potencial individual. Intelectuales como Petrarca y Erasmo impulsaron el estudio de los textos clásicos y el pensamiento crítico, promoviendo una era de esplendor en la literatura, las ciencias y las artes.\r\n\r\nEl Renacimiento dio al mundo algunas de sus más grandes figuras. Leonardo da Vinci, prototipo del “hombre renacentista”, destacó como pintor, ingeniero y científico. Sus obras La última cena y La Mona Lisa siguen siendo iconos del arte occidental. Miguel Ángel, con su escultura David y la pintura de la Capilla Sixtina, encarna el ideal de perfección y espiritualidad de la época.\r\n\r\nLa invención de la imprenta por Johannes Gutenberg alrededor de 1440 revolucionó la difusión del conocimiento, haciendo los libros más accesibles y fomentando el aprendizaje y el intercambio de ideas.\r\n\r\nLa arquitectura renacentista recuperó los principios clásicos de proporción, simetría y orden. Las ciudades de Florencia, Roma y Venecia se convirtieron en centros culturales y artísticos, gracias al mecenazgo de familias poderosas como los Médici.\r\n\r\nEl Renacimiento sentó las bases del pensamiento moderno occidental. Fomentó la exploración intelectual, la creatividad y la búsqueda del conocimiento, elementos que influirían en el Siglo de las Luces y las revoluciones científicas posteriores. Es recordado como una era gloriosa que cambió la historia de la humanidad.\r\n\r\n'),
(21, 2, 11, 'L’évolution de la musique', 'La musique est l’une des formes d’expression humaine les plus anciennes et universelles. Son évolution reflète le parcours de la civilisation, en témoignant du développement culturel, technologique et émotionnel des sociétés à travers le temps. Des rythmes primitifs aux chefs-d\'œuvre symphoniques, des chants populaires à la production numérique, la musique a toujours su se réinventer tout en conservant une place centrale dans la vie humaine.\r\n\r\nDans l’Antiquité, la musique était surtout un acte collectif et spirituel. Les premiers humains utilisaient des percussions, des flûtes d’os et des chants vocaux lors de rituels, récits et festivités. En Mésopotamie, en Égypte, en Grèce et en Chine anciennes, la musique tenait une place essentielle dans les cérémonies religieuses, les cours royales et les représentations théâtrales.\r\n\r\nAu Moyen Âge, la musique sacrée se développe en Europe, notamment avec le chant grégorien dans les monastères et églises. L’invention de la notation musicale permet ensuite aux compositeurs d’écrire des œuvres plus complexes à la Renaissance et à l’époque baroque.\r\n\r\nL’ère classique, avec Mozart, Haydn et Beethoven, impose des formes structurées comme la symphonie et la sonate. La musique devient un art raffiné, symbole des idéaux des Lumières : équilibre, clarté et émotion. Le romantisme, qui suit, privilégie l’expression personnelle, le drame et le nationalisme, incarné par Chopin, Wagner ou Tchaïkovski.\r\n\r\nAu XXe siècle, la musique subit une révolution. Le jazz, le blues, le rock et le hip-hop, issus des communautés afro-américaines, deviennent mondiaux. La musique classique explore le modernisme, le minimalisme et les expériences sonores.\r\n\r\nLa technologie joue un rôle fondamental : phonographes, radios, streaming, synthétiseurs et ordinateurs créent de nouveaux genres (électro, techno, pop). Internet favorise la diffusion globale et la collaboration interculturelle.\r\n\r\nAujourd’hui, la musique est plus riche et accessible que jamais. Elle dépasse les frontières, inspire les mouvements sociaux et reste une force d’identité et d’émotion. Des orchestres symphoniques aux groupes indépendants, du K-pop au flamenco, la musique continue d’évoluer, témoignant de l’inventivité humaine et de notre héritage culturel.\r\n\r\n'),
(22, 3, 11, 'La evolución de la música', 'La música es una de las formas de expresión humana más antiguas y universales. Su evolución narra la historia misma de la civilización, reflejando el desarrollo cultural, tecnológico y emocional de las sociedades a lo largo del tiempo. Desde ritmos tribales hasta sinfonías complejas, y desde cantos populares hasta producción digital, la música ha cambiado constantemente sin perder su papel esencial en la vida humana.\r\n\r\nEn la antigüedad, la música era una experiencia comunitaria y espiritual. Los primeros humanos usaban tambores, flautas de hueso y cantos para rituales, narraciones y celebraciones. En las civilizaciones de Mesopotamia, Egipto, Grecia y China, la música era clave en ceremonias religiosas, cortes reales y espectáculos teatrales.\r\n\r\nDurante la Edad Media, la música sacra se desarrolló en Europa con el canto gregoriano, mientras que la invención de la notación musical permitió componer piezas más complejas en el Renacimiento y el Barroco.\r\n\r\nLa era clásica, con compositores como Mozart, Haydn y Beethoven, introdujo formas estructuradas como la sinfonía y la sonata. La música alcanzó un alto grado de sofisticación y se presentó en grandes teatros, expresando ideales de equilibrio y emoción. El romanticismo impulsó la expresión personal y el sentimiento nacional, con figuras como Chopin, Wagner y Chaikovski.\r\n\r\nEn el siglo XX, la música vivió transformaciones radicales. El jazz, el blues, el rock y el hip-hop nacieron en comunidades afroamericanas y conquistaron el mundo. La música clásica adoptó nuevas corrientes como el modernismo y el minimalismo.\r\n\r\nLa tecnología cambió todo: fonógrafos, radio, streaming y computadoras crearon géneros como la electrónica, el techno y el pop. Internet facilitó la distribución global y la colaboración entre culturas.\r\n\r\nHoy, la música es más diversa y accesible que nunca. Cruza fronteras, define identidades y expresa emociones. Desde orquestas hasta bandas independientes, desde el K-pop hasta el flamenco, la música sigue siendo una manifestación viva del espíritu humano.'),
(23, 2, 12, 'L’impact des arts visuels sur la société', 'Les arts visuels — peinture, sculpture, photographie, architecture, et médias numériques — jouent depuis toujours un rôle fondamental dans la formation des cultures et l’expression des expériences humaines. Bien plus que décoratifs, ils sont un langage visuel au service du récit, de la contestation, de la spiritualité et de l’identité.\r\n\r\nDepuis les peintures rupestres préhistoriques de Lascaux jusqu’aux installations contemporaines, l’humanité utilise l’art pour exprimer idées, émotions et visions du monde. Dans l’Égypte ancienne, la Grèce antique ou l’Inde, l’art était indissociable de la religion et du pouvoir politique. Temples, fresques et sculptures servaient à glorifier les dieux, célébrer les souverains et transmettre des valeurs communes.\r\n\r\nLa Renaissance voit émerger des artistes comme Raphaël et Titien, qui révolutionnent l’art par la perspective, le réalisme et l’émotion humaine. Le Baroque amplifie les contrastes et la théâtralité, tandis que le Romantisme explore les sentiments intimes et le sublime. Aux XIXe et XXe siècles, l’art devient un terrain d’expérimentation : Impressionnisme, Cubisme, Surréalisme et Abstraction bousculent les règles classiques.\r\n\r\nL’art visuel est aussi un vecteur de critique sociale. Goya dénonce les horreurs de la guerre, Picasso choque avec Guernica, et le street art des villes modernes interpelle sur les injustices contemporaines. Les mouvements Dada ou Pop Art remettent en question la société de consommation et les conventions.\r\n\r\nÀ l’ère numérique, l’art s’étend au numérique, à la réalité virtuelle, aux vidéos immersives et à la modélisation 3D. Les réseaux sociaux ouvrent une vitrine mondiale à tous les artistes, favorisant la diversité culturelle et les échanges internationaux.\r\n\r\nLes arts visuels contribuent à l’éducation, la santé mentale, le développement urbain et le dialogue diplomatique. Ils embellissent nos villes, aident à guérir les blessures émotionnelles et stimulent la réflexion collective. Musées, expositions et œuvres publiques incarnent notre mémoire et notre avenir.\r\n\r\nEn somme, l’art visuel est à la fois miroir du monde et lumière de la pensée. Il révèle la complexité humaine et ouvre des perspectives nouvelles grâce à la forme, la couleur et le symbole.'),
(24, 3, 12, 'El impacto de las artes visuales en la sociedad', 'Las artes visuales — que incluyen pintura, escultura, fotografía, arquitectura y medios digitales — han sido una fuerza poderosa en la historia de la humanidad, moldeando culturas y reflejando la experiencia humana. Más allá de lo estético, las artes visuales han servido como medio de narración, crítica social, conexión espiritual e identidad cultural.\r\n\r\nDesde las pinturas rupestres de Lascaux hasta las instalaciones contemporáneas, los seres humanos han usado el arte para comunicar ideas, emociones y visiones del mundo. En civilizaciones antiguas como Egipto, Grecia e India, el arte estaba ligado al poder religioso y político, y se utilizaba para exaltar a los dioses, legitimar a los gobernantes y transmitir valores comunes.\r\n\r\nDurante el Renacimiento, artistas como Rafael y Tiziano transformaron la pintura mediante el uso de la perspectiva, el realismo y la emoción. El Barroco introdujo dramatismo y opulencia, mientras que el Romanticismo exploró lo sublime y lo personal. En los siglos XIX y XX surgieron vanguardias como el Impresionismo, el Cubismo, el Surrealismo y la Abstracción, que desafiaron las normas tradicionales.\r\n\r\nEl arte también ha sido instrumento de crítica social. Las obras de Goya, el Guernica de Picasso o el arte urbano contemporáneo reflejan conflictos, denuncias y aspiraciones colectivas. Movimientos como el Dadaísmo y el Pop Art cuestionaron la cultura de masas y el orden establecido.\r\n\r\nHoy, en la era digital, las artes visuales se reinventan con tecnologías como la pintura digital, el modelado 3D, la realidad virtual y el videoarte. Plataformas digitales permiten a artistas de todo el mundo compartir su trabajo y fomentar el diálogo global.\r\n\r\nEl arte visual impacta la educación, la salud mental, la planificación urbana y la diplomacia. Embellece los espacios públicos, estimula la empatía y transmite memoria cultural. Museos y galerías permiten el acceso al patrimonio artístico y fortalecen la creatividad colectiva.\r\n\r\nEn definitiva, las artes visuales son espejo y faro: reflejan los desafíos de la sociedad y abren caminos para nuevas interpretaciones. A través del color, la forma y el símbolo, nos conectan con nuestra humanidad compartida.\r\n\r\n');
INSERT INTO `translations` (`id`, `languageId`, `articleId`, `translatedTitle`, `translatedContent`) VALUES
(25, 2, 13, 'Léonard de Vinci – Le génie universel', 'Léonard de Vinci, né en 1452 à Vinci en Italie, est l’un des plus grands génies de l’histoire. Peintre, inventeur, ingénieur, anatomiste, architecte, musicien et philosophe, il incarne l’idéal de l’homme de la Renaissance — un être curieux et créatif aux multiples talents. Son œuvre touche à la fois l’art et la science, faisant de lui un symbole du potentiel humain.\r\n\r\nParmi ses chefs-d’œuvre artistiques figurent La Cène, L’Homme de Vitruve, et bien sûr la Joconde, l’un des tableaux les plus célèbres au monde. Léonard a révolutionné l’art par sa maîtrise de la lumière, de l’ombre (le clair-obscur) et de la perspective. Ses œuvres expriment avec finesse les émotions humaines et la beauté de la nature.\r\n\r\nEn dehors de la peinture, Léonard a laissé des milliers de pages de carnets où il note idées, croquis et observations scientifiques. Il y imagine des machines en avance sur leur temps : avions, chars d’assaut, systèmes hydrauliques, et même des automates. Peu d’entre elles ont été construites, mais elles démontrent une compréhension exceptionnelle des lois mécaniques.\r\n\r\nSes études anatomiques sont tout aussi impressionnantes. En disséquant des cadavres, il décrit avec précision les muscles, les os, les organes et même la circulation sanguine. Ses dessins médicaux sont restés des références pendant des siècles.\r\n\r\nCe qui distingue Léonard, c’est son esprit multidisciplinaire. Pour lui, art et science étaient liés. Cette vision continue d’inspirer artistes, ingénieurs et penseurs dans le monde entier.\r\n\r\nIl meurt en 1519 à Amboise, en France, sous la protection du roi François Ier. Son héritage, qui incarne l’esprit de la Renaissance, influence encore profondément notre monde contemporain. Léonard de Vinci reste une icône du génie humain.\r\n\r\n'),
(26, 3, 13, 'Leonardo da Vinci – El genio universal', 'Leonardo da Vinci, nacido en 1452 en Vinci, Italia, es uno de los más grandes genios de la historia. Pintor, inventor, ingeniero, anatomista, arquitecto, músico y filósofo, representa el ideal renacentista del “hombre universal”, con una curiosidad infinita y un talento extraordinario.\r\n\r\nEntre sus obras más célebres se encuentran La última cena, El Hombre de Vitruvio y la Mona Lisa, considerada la pintura más famosa del mundo. Leonardo revolucionó el arte mediante el uso magistral de la luz, la sombra (claroscuro) y la perspectiva. Supo capturar emociones humanas y la esencia de la naturaleza con una precisión admirable.\r\n\r\nMás allá del arte, dejó numerosos cuadernos llenos de bocetos, ideas e investigaciones científicas. Diseñó máquinas adelantadas a su tiempo: aparatos voladores, tanques, sistemas hidráulicos e incluso autómatas. Aunque no se construyeron en su época, revelan un conocimiento avanzado de la mecánica.\r\n\r\nTambién realizó detallados estudios anatómicos, diseccionando cadáveres para comprender músculos, órganos y el funcionamiento del corazón. Sus ilustraciones médicas fueron insuperables durante siglos.\r\n\r\nLo que hace único a Leonardo no es solo su talento, sino su enfoque integral del conocimiento. Creía que el arte y la ciencia estaban profundamente conectados, una idea que aún guía a los innovadores actuales.\r\n\r\nMurió en 1519 en Amboise, Francia, bajo el mecenazgo del rey Francisco I. Su legado, que define la esencia del Renacimiento, sigue inspirando al mundo moderno. Leonardo da Vinci sigue siendo una figura monumental en la historia de la humanidad.'),
(27, 2, 14, 'Marie Curie – Pionnière de la radioactivité', 'Marie Curie, née Maria Sklodowska en 1867 à Varsovie (Pologne), fut une physicienne et chimiste dont les travaux révolutionnaires sur la radioactivité ont profondément marqué la science. Elle est la première femme à avoir reçu un prix Nobel, et la seule personne à en avoir obtenu deux dans deux disciplines scientifiques différentes (physique et chimie).\r\n\r\nElle s’installa à Paris pour étudier à la Sorbonne, où elle obtint des diplômes en physique et en mathématiques. C’est là qu’elle rencontra Pierre Curie, son mari et partenaire scientifique. Ensemble, ils se consacrèrent à l’étude des substances radioactives, à la suite des découvertes des rayons X et de la radiation de l’uranium.\r\n\r\nLeurs recherches menèrent à la découverte de deux éléments nouveaux : le polonium, nommé en l’honneur de la patrie de Marie, et le radium, tous deux émettant une forte radioactivité. Marie extrayait le radium de la pechblende dans des conditions très difficiles, ignorant les dangers de l’exposition prolongée aux radiations.\r\n\r\nEn 1903, elle reçut le prix Nobel de physique, partagé avec Pierre Curie et Henri Becquerel, pour leurs travaux sur la radioactivité spontanée. Après la mort accidentelle de Pierre en 1906, elle poursuivit seule leurs recherches et obtint un second prix Nobel, en chimie cette fois, en 1911, pour la découverte du radium et du polonium.\r\n\r\nPendant la Première Guerre mondiale, elle développa des unités mobiles de radiographie pour les champs de bataille, formant des femmes techniciennes et se rendant elle-même au front. Ses actions permirent de sauver d’innombrables vies grâce à l’imagerie médicale.\r\n\r\nMarie Curie incarne la persévérance scientifique et l’émancipation des femmes dans un monde dominé par les hommes. Malgré la pauvreté et la discrimination, elle ne cessa jamais sa quête de connaissance. Elle mourut en 1934 d’une anémie aplasique causée par une exposition prolongée aux radiations.\r\n\r\nSon nom est aujourd’hui associé à des prix, des institutions scientifiques, et même un élément chimique : le curium. Marie Curie demeure une figure emblématique du génie scientifique et de l’engagement sans compromis.'),
(28, 3, 14, 'Marie Curie – Pionera de la radiactividad', 'Marie Curie, nacida como Maria Sklodowska en Varsovia, Polonia, en 1867, fue una física y química cuya labor pionera en el estudio de la radiactividad transformó la ciencia moderna. Fue la primera mujer en ganar un Premio Nobel y la única persona que ha recibido dos Nobel en diferentes campos científicos: Física y Química.\r\n\r\nCurie se trasladó a París para estudiar en la Sorbona, donde obtuvo títulos en física y matemáticas. Allí conoció a Pierre Curie, con quien se casó y colaboró en investigaciones científicas. Juntos comenzaron a estudiar sustancias radioactivas tras el descubrimiento de los rayos X y la radiación del uranio.\r\n\r\nDescubrieron dos nuevos elementos químicos: el polonio, en honor al país natal de Marie, y el radio, ambos con intensa radiactividad. Marie trabajó incansablemente para aislar el radio a partir de toneladas de pechblenda, sin protección alguna contra la radiación, cuyos peligros eran entonces desconocidos.\r\n\r\nEn 1903, recibió el Premio Nobel de Física junto a Pierre Curie y Henri Becquerel. Tras la muerte accidental de Pierre en 1906, Marie continuó sus investigaciones y ganó un segundo Premio Nobel en 1911, esta vez en Química, por el descubrimiento del radio y el polonio.\r\n\r\nDurante la Primera Guerra Mundial, desarrolló unidades móviles de rayos X para asistir a los heridos en el frente, y formó a mujeres como técnicas radiológicas. Su valentía y entrega salvaron muchas vidas.\r\n\r\nEl legado de Curie es inmenso. Fue una científica incansable, una mujer que rompió barreras en un mundo masculino, y una pionera en el uso del conocimiento al servicio de la humanidad. Murió en 1934 debido a una anemia aplásica causada por la exposición prolongada a la radiación.\r\n\r\nEn su honor se han creado premios, centros de investigación, y un elemento químico —el curio— lleva su nombre. Marie Curie es un modelo de excelencia científica, valentía y humanidad.'),
(29, 2, 15, 'Nelson Mandela – Défenseur de la liberté et de la réconciliation', 'Nelson Mandela, né en 1918 dans le village rural de Mvezo en Afrique du Sud, est devenu une icône mondiale de la paix, de la justice et de la résilience. Premier président noir de l’Afrique du Sud et militant infatigable de la liberté, il a mené la lutte contre l’apartheid, un système cruel de ségrégation raciale qui a opprimé des millions de Sud-Africains.\r\n\r\nMandela a étudié le droit à l’Université de Fort Hare et à celle du Witwatersrand avant de rejoindre le Congrès national africain (ANC), un parti politique engagé dans la lutte contre l’apartheid. Dans les années 1950 et 1960, il organise des manifestations, des grèves et des actes de désobéissance civile pour défendre l’égalité et la dignité humaine.\r\n\r\nEn 1962, Mandela est arrêté et condamné à la prison à vie pour complot contre l’État. Il passe 27 ans en détention, principalement sur l’île de Robben, dans des conditions extrêmement dures. Malgré tout, il ressort de prison non pas animé par la haine, mais porteur d’un message de paix et de réconciliation.\r\n\r\nLibéré en 1990, il joue un rôle fondamental dans la transition pacifique vers une démocratie multiraciale. En 1994, il devient président lors des premières élections libres de l’histoire sud-africaine. Son mandat est centré sur la réconciliation nationale, la lutte contre la pauvreté, l’accès à l’éducation et la construction d’un État de droit.\r\n\r\nLe style de leadership de Mandela — ferme mais modeste, conciliant mais déterminé — lui vaut une admiration mondiale. Il choisit de ne pas briguer un second mandat, affirmant que le pouvoir doit servir le peuple, et non l’ambition personnelle. Il consacre ses dernières années à des œuvres philanthropiques, notamment à travers la Nelson Mandela Foundation.\r\n\r\nMandela s’éteint en 2013 à l’âge de 95 ans. Son héritage incarne la force morale, la sagesse et le courage face à l’injustice. Il reste une source d’inspiration pour les peuples opprimés du monde entier.'),
(30, 3, 15, 'Nelson Mandela – Luchador por la libertad y la reconciliación', 'Nelson Mandela, nacido en 1918 en la aldea rural de Mvezo, Sudáfrica, se convirtió en un símbolo mundial de paz, justicia y resistencia. Fue el primer presidente negro de Sudáfrica y un incansable luchador por la libertad que lideró la lucha contra el apartheid, el sistema racista de segregación que dominó su país durante décadas.\r\n\r\nEstudió Derecho en la Universidad de Fort Hare y en la de Witwatersrand. Se unió al Congreso Nacional Africano (ANC), donde organizó protestas, huelgas y actos de desobediencia civil. Su lucha estaba centrada en lograr la igualdad de derechos para todos los sudafricanos.\r\n\r\nEn 1962, Mandela fue arrestado y condenado a cadena perpetua por conspirar contra el régimen. Pasó 27 años en prisión, en su mayoría en la isla de Robben, bajo condiciones duras. A pesar de ello, salió de prisión con un espíritu de reconciliación en lugar de venganza, decidido a construir una nación unida.\r\n\r\nTras su liberación en 1990, fue clave en la transición hacia una democracia multirracial. En 1994, fue elegido presidente en las primeras elecciones libres y justas de Sudáfrica. Durante su presidencia, promovió la reconciliación nacional, la educación, la reducción de la pobreza y la construcción de un país justo para todos.\r\n\r\nMandela fue admirado por su liderazgo ético y humilde. Se negó a postularse para un segundo mandato, defendiendo la idea de que el poder debe estar al servicio del pueblo. Dedicó sus últimos años a causas humanitarias, especialmente a través de la Fundación Nelson Mandela.\r\n\r\nFalleció en 2013 a los 95 años. Su legado vive en los corazones de millones de personas como ejemplo de coraje, dignidad y humanidad. Nelson Mandela es recordado como un libertador y un símbolo de esperanza universal.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `editorId_foreign` (`editorId`),
  ADD KEY `categoryId_foreign` (`categoryId`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `interactions`
--
ALTER TABLE `interactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_interaction_f` (`userId`),
  ADD KEY `article_interaction_f` (`articleId`),
  ADD KEY `type_interaction_f` (`typeId`);

--
-- Indexes for table `interactiontypes`
--
ALTER TABLE `interactiontypes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lists`
--
ALTER TABLE `lists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userId_list` (`userId`);

--
-- Indexes for table `lists_articles`
--
ALTER TABLE `lists_articles`
  ADD PRIMARY KEY (`listId`,`articleId`),
  ADD KEY `a_list_articles_f` (`articleId`),
  ADD KEY `l_list_articles_f` (`listId`);

--
-- Indexes for table `registeredusers`
--
ALTER TABLE `registeredusers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `roleId_foreign` (`roleId`);

--
-- Indexes for table `reportreasons`
--
ALTER TABLE `reportreasons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userId_report_const` (`userId`),
  ADD KEY `articleId_report_const` (`articleId`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `searchhistory`
--
ALTER TABLE `searchhistory`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userId_foreign2` (`userId`);

--
-- Indexes for table `translations`
--
ALTER TABLE `translations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `languageId_foreign` (`languageId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `interactions`
--
ALTER TABLE `interactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `interactiontypes`
--
ALTER TABLE `interactiontypes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `lists`
--
ALTER TABLE `lists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `registeredusers`
--
ALTER TABLE `registeredusers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `reportreasons`
--
ALTER TABLE `reportreasons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `searchhistory`
--
ALTER TABLE `searchhistory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `translations`
--
ALTER TABLE `translations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `categoryId_foreign` FOREIGN KEY (`categoryId`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `editorId_foreign` FOREIGN KEY (`editorId`) REFERENCES `registeredusers` (`id`);

--
-- Constraints for table `interactions`
--
ALTER TABLE `interactions`
  ADD CONSTRAINT `article_interaction_f` FOREIGN KEY (`articleId`) REFERENCES `articles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `type_interaction_f` FOREIGN KEY (`typeId`) REFERENCES `interactiontypes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_interaction_f` FOREIGN KEY (`userId`) REFERENCES `registeredusers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `lists`
--
ALTER TABLE `lists`
  ADD CONSTRAINT `userId_list` FOREIGN KEY (`userId`) REFERENCES `registeredusers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `lists_articles`
--
ALTER TABLE `lists_articles`
  ADD CONSTRAINT `a_list_articles_f` FOREIGN KEY (`articleId`) REFERENCES `articles` (`id`),
  ADD CONSTRAINT `l_list_articles_f` FOREIGN KEY (`listId`) REFERENCES `lists` (`id`);

--
-- Constraints for table `registeredusers`
--
ALTER TABLE `registeredusers`
  ADD CONSTRAINT `roleId_foreign` FOREIGN KEY (`roleId`) REFERENCES `roles` (`id`);

--
-- Constraints for table `reports`
--
ALTER TABLE `reports`
  ADD CONSTRAINT `articleId_report_const` FOREIGN KEY (`articleId`) REFERENCES `articles` (`id`),
  ADD CONSTRAINT `userId_report_const` FOREIGN KEY (`userId`) REFERENCES `registeredusers` (`id`);

--
-- Constraints for table `searchhistory`
--
ALTER TABLE `searchhistory`
  ADD CONSTRAINT `userId_foreign2` FOREIGN KEY (`userId`) REFERENCES `registeredusers` (`id`);

--
-- Constraints for table `translations`
--
ALTER TABLE `translations`
  ADD CONSTRAINT `languageId_foreign` FOREIGN KEY (`languageId`) REFERENCES `languages` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
