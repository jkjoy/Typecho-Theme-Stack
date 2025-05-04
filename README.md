## 简介

本主题从Hugo主题`Stack`移植而来.

原项目地址

https://github.com/CaiJimmy/hugo-theme-stack

## 使用

- 站点 LOGO 地址 (为左侧边栏头像)

- 站点 Favicon 地址 ( Favicon )

- 根据页面的 slug  添加对应的图标

图标来源:
 https://tabler.io/icons

匹配的slug有 

关于 `about` 
归档 `archives` 
留言 `gbook` 
评论 `messages` 
链接 `links` 

新建页面时请保持以上的别名,否则图标不会显示.


- 是否使用魔改风格 (mod风格来自其他`Stack`用户)

- 分类图片目录 (按照分类的 mid 以jpg的格式 存放的目录 ,譬如 本地目录 或者 CDN 等,用于匹配归档页面的分类图片 )

- 使用第三方评论 (可以选择使用第三方的评论系统 如 `twikoo` 等)

- Header代码 (用于身份验证 等,支持HTML语法)

- Footer代码 (用于插入备案号码 或者 统计代码等,支持HTML语法)

- 自定义社交图标 (支持HTML语法)

```html
<li>
    <a href="地址" target="_blank">
        <svg  xmlns="http://www.w3.org/2000/svg"  class="icon icon-tabler icon-tabler-brand-twitter" width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-brand-instagram"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 8a4 4 0 0 1 4 -4h8a4 4 0 0 1 4 4v8a4 4 0 0 1 -4 4h-8a4 4 0 0 1 -4 -4z" /><path d="M9 12a3 3 0 1 0 6 0a3 3 0 0 0 -6 0" /><path d="M16.5 7.5v.01" /></svg>
    </a>
</li>
```
保持以上格式添加

## 声明

版权归原作者所有,建议保留链接.谢谢!