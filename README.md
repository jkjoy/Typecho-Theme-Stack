## 简介

本主题从Hugo主题`Stack`移植而来.

原项目地址

https://github.com/CaiJimmy/hugo-theme-stack

## 使用

- 站点 LOGO 地址 (为左侧边栏头像)

- 站点 Favicon 地址 ( Favicon )

- 归档页面地址 (在创建`归档`页面后,在此填入地址)

- 链接页面地址 (使用`links`插件,在创建链接页面后,在此填入地址)

- 关于页面地址 (在创建`关于`页面后,在此填入地址)

- 自定义菜单

```html
        <li >
            <a href='/' >
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-home" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"/><polyline points="5 12 3 12 12 3 21 12 19 12" /><path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" /><path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" /></svg>
                <span>首页</span>
            </a>
        </li>
```
按照此格式填入 

- 是否在侧边栏显示按日期归档 (在日期归档过多时,可以选择是否显示)

- 是否使用魔改风格 (mod风格来自其他`Stack`用户)

- 分类图片目录 (按照分类的 mid 以jpg的格式 存放的目录 ,譬如 本地目录 或者 CDN 等,用于匹配归档页面的分类图片 )

- 使用第三方评论 (可以选择使用第三方的评论系统 如 `twikoo` 等)

- Header代码 (用于身份验证 等,支持HTML语法)

- Footer代码 (用于插入备案号码 或者 统计代码等,支持HTML语法)

## 声明

版权归原作者所有,建议保留链接.谢谢!