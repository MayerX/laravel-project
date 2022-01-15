@extends('common.app')

<div class="px-32 py-5 mx-auto shadow">
    <div class="relative flex items-center grid-cols-2 lg:grid-cols-3">
        <ul class="flex items-center space-x-5 lg:flex">
            <li>
                <a href="/"
                    class="font-medium text-gray-700 transition-colors duration-200 hover:text-deep-purple-accent-400">关于中风</a>
            </li>
            <li>
                <a href="/"
                    class="font-medium text-gray-700 transition-colors duration-200 hover:text-deep-purple-accent-400">关于我们</a>
            </li>
            <li>
                <a href="/"
                    class="font-medium text-gray-700 transition-colors duration-200 hover:text-deep-purple-accent-400">会员注册</a>
            </li>
            <li>
                <a href="/"
                    class="font-medium text-gray-700 transition-colors duration-200 hover:text-deep-purple-accent-400">产品及服务</a>
            </li>
        </ul>
        <a href="/" class="inline-flex items-center lg:mx-auto">
            <svg class="w-8 text-deep-purple-accent-400" viewBox="0 0 24 24" stroke-linejoin="round" stroke-width="2"
                stroke-linecap="round" stroke-miterlimit="10" stroke="currentColor" fill="none">
                <rect x="3" y="1" width="7" height="12"></rect>
                <rect x="3" y="17" width="7" height="6"></rect>
                <rect x="14" y="1" width="7" height="6"></rect>
                <rect x="14" y="11" width="7" height="12"></rect>
            </svg>
            <span class="ml-2 text-xl font-bold tracking-wide text-gray-800 uppercase">怡家健康网</span>
        </a>
        <ul class="flex items-center hidden ml-auto space-x-8 lg:flex">
            <li>
                <a href="/"
                    class="font-medium text-gray-700 transition-colors duration-200 hover:text-deep-purple-accent-400">联系我们</a>
            </li>
            <li>
                <a href="/"
                    class="font-medium tracking-wide text-gray-700 transition-colors duration-200 hover:text-deep-purple-accent-400">
                    登录
                </a>
            </li>
            <li>
                <a href="/"
                    class="inline-flex items-center justify-center h-12 px-6 font-medium tracking-wide text-white transition duration-200 rounded shadow-md bg-deep-purple-accent-400 hover:bg-deep-purple-accent-700 focus:shadow-outline focus:outline-none">
                    注册
                </a>
            </li>
        </ul>
    </div>
</div>
