<?php

use App\Enums\Status;

return [
    'tinymceAndPrism' => [
        'category' => 'javascript',
        'name' => 'Highlighting Code: Tinymce & Prism.js Magic',
        'description' => 'Transform plain code to polished elegance style with just using javascript',
        'text' => <<<'TEXT'
                <p>Hey there! 👋 Ready to add a touch of magic to your code on web pages? I am using this method when its necessary. Let's dive deep to explore a basic way to present your code snippets, tutorials, and more by highlighting them for better readability.</p>
                <p>&nbsp;</p>
                <h2>Introduction</h2><hr>
                <p>When I was working on my website, I wanted to enhance my content using Tinymce. That's when I discovered the <code>codesample</code> plugin &ndash; a first-party code highlighter in Tinymce powered by Prism.js.</p>
                <p>This plugin uses Prism.js under the hood, so I decided to integrate Prism.js into my project. Let's do it together!</p>
                <p>&nbsp;</p>
                <h2>Installation Step: Tinymce v6</h2><hr>
                <p>I've been a long-time user of Tinymce, but there are alternatives out there. Tinymce is using version 6 right now. For Tinymce, you can either use npm or include it via CDN. I opted for the CDN approach.</p>
                <p><em>1g8t0mx...</em> is mine personal public api key. You may register to tinymce and get your key for free.</p>
                <p>Put this into your&nbsp;<strong>&lt;head&gt;&lt;/head&gt;</strong> tags.&nbsp;</p>
                <pre class="language-markup"><code>&lt;script src="https://cdn.tiny.cloud/1/ig8t0mxa35onbhql3exl3b6p8fi76djyi00620a7pduivaay/tinymce/6/tinymce.min.js" referrerpolicy="origin"&gt;&lt;/script&gt;</code></pre>
                <p>Now tinymce is ready to use.</p>
                <p>&nbsp;</p>
                <h2>Let's Configure Tinymce</h2><hr>
                <p>Here's my customized Tinymce setup with a bunch of plugins and toolbars. Copy these lines into your html file, and you're good to go:</p>
                <pre class="language-javascript"><code>&lt;script&gt;
                    window.addEventListener('DOMContentLoaded', () =&gt; {
                        tinymce.init({
                            selector: 'textarea',
                            plugins: 'codesample code link autolink autosave charmap emoticons fullscreen help image lists media preview quickbars searchreplace table wordcount',
                            toolbar1: 'undo redo | styles | bold italic | numlist bullist | outdent indent',
                            toolbar2: 'table tabledelete | tableprops tablerowprops tablecellprops | tableinsertrowbefore tableinsertrowafter tabledeleterow | tableinsertcolbefore tableinsertcolafter tabledeletecol',
                            toolbar3: 'codesample code copySourceCode | image media link emoticons charmap | restoredraft searchreplace wordcount | fullscreen preview | help',
                            height: 1100,
                            fullscreen_native: true,
                            image_caption: true,
                            image_title: true,
                            link_context_toolbar: true,
                            link_default_target: '\_blank',
                            codesample_global_prismjs: true,
                            codesample_languages: [
                                { text: 'HTML/XML', value: 'markup' },
                                { text: 'JavaScript', value: 'javascript' },
                                { text: 'CSS', value: 'css' },
                                { text: 'PHP', value: 'php' },
                                { text: 'Ruby', value: 'ruby' },
                                { text: 'Python', value: 'python' },
                                { text: 'Java', value: 'java' },
                                { text: 'C', value: 'c' },
                                { text: 'C#', value: 'csharp' },
                                { text: 'C++', value: 'cpp' }
                            ],
                        });
                    });
                &lt;/script&gt;</code></pre>
                <p>Remember, you can use a specific ID if you want to target a particular textarea&nbsp;</p>
                <pre class="language-javascript"><code>selector: 'textarea#someId'</code></pre>
                <p>After you add this setup like this. TADA! Tinymce is ready to use:</p>
                <p><img src="/images/blog/tinymce_prism/tinymce_ready.png" width="599" height="508"></p>
                <p>I have added form with title and text. So I can push my content to db. I am skipping this part.</p>
                <p>&nbsp;</p>
                <h3>The Key: Codesample Plugin</h3>
                <p>The real magic happens with the <code>codesample</code> plugin. It allows you to highlight codes in the editor using Prism.js. Check out the <a href="https://www.tiny.cloud/docs/tinymce/6/codesample/#basic-setup" target="_new">codesample documentation</a> for more details.</p>
                <p>After adding it, you'll notice a new button in your Tinymce &ndash; the code sample button <code>{;}</code>. Click it, insert your code block, and witness the transformation!</p>
                <p>Lets demonstrate an example with some images</p>
                <p><img src="/images/blog/tinymce_prism/tinymce_adding_code.png" width="860" height="669"></p>
                <p>Than save it! This is the result:</p>
                <p><img src="/images/blog/tinymce_prism/tinymce_added_code.png" width="861" height="533"></p>
                <p>It looks perfect! I have filled the form and submited and voila! Saved on db. But skipping this part 😝</p>
                <p>&nbsp;</p>
                <h2>Displaying Prism style text on Html file</h2><hr>
                <p>I have filled the form and submited and voila! Saved on db. I have opened my content page. Here it is:</p>
                <p><img src="/images/blog/tinymce_prism/plain_view.png" width="472" height="465"></p>
                <p>But hold on &ndash; it's not colorful yet (As expected).Time to include Prism.js! Because prism.js is using by tinymce. We didn't included yet.</p>
                <p>&nbsp;</p>
                <h2>Install Prism.js</h2><hr>
                <p>Install prism with npm first:</p>
                <pre class="language-markup"><code>npm install prismjs</code></pre>
                <p>&nbsp;</p>
                <p>Include to our project:</p>
                <p>I'm using Vite as my module bundler, but feel free to adapt to your setup:</p>
                <p>For example in <strong>Laravel</strong> its in ./resource/js/app.js</p>
                <pre class="language-javascript"><code>import Prism from 'prismjs';

                import 'prismjs/themes/prism-okaidia.css';
                import 'prismjs/components/prism-markup-templating';
                import 'prismjs/components/prism-javascript';
                import 'prismjs/components/prism-php';
                import 'prismjs/components/prism-bash';</code></pre>
                <p>Its included and ready to use.</p>
                <p>&nbsp;</p>
                <p>Dont forget to use&nbsp;</p>
                <pre class="language-markup"><code>npm run dev</code></pre>
                <p>or</p>
                <pre class="language-markup"><code>npm run build</code></pre>
                <p>Now refresh our page!</p>
                <p><img src="/images/blog/tinymce_prism/prism_view.png"></p>
                <p>This is the expected result!</p>
                <h2>Steps Summary</h2><hr>
                <ul>
                <li>Add TinymceJS:</li>
                <li>Add <code>codesample</code> plugin to <code>tinymce.init({...})</code></li>
                <li>Import Prism.js and your preferred languages</li>
                </ul>
                <h2>The Grand Finale!</h2><hr>
                <p>Your code is now shining bright with Prism.js. Feel free to switch up the theme and make it uniquely yours!</p>
                <p>Happy coding, and keep spreading the dev love! 💻❤️</p>
                TEXT,
        'status' => Status::ACTIVE,
        'images' => [public_path('images/blog/tinymce_prism/banner.png')]
    ]
];
