<div>
    <!-- 页面标题区域美化 -->
    <div class="text-center mb-4">
        <div class="hero-section bg-gradient-primary text-white rounded-lg py-4 mb-3">
            <h1 class="display-4 font-weight-bold">炎黄英雄榜</h1>
            <p class="lead mb-0">MUD江湖，谁与争锋</p>
        </div>

        <!-- 搜索框美化 -->
        <div class="search-container mb-3">
            <div class="input-group input-group-lg">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-primary text-white">
                        <i class="fas fa-search"></i>
                    </span>
                </div>
                <input class="form-control" type="search"
                       placeholder="🔍 搜索玩家ID、姓名或称号..."
                       aria-label="Search"
                       wire:model.live.debounce.300ms="search"
                       style="border-radius: 0 25px 25px 0;">
            </div>
        </div>
    </div>

    <!-- 桌面端表格视图 - 根据屏幕大小调整显示 -->
    <div class="d-none d-xl-block">
        <div class="card border-0 mud-card shadow-lg">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0 mud-table">
                        <thead class="mud-thead">
                            <tr>
                                <th width="45" class="text-center font-weight-bold" style="white-space: nowrap;">
                                    <div class="header-cell">
                                        <div class="header-icon">🏆</div>
                                        <div class="header-text">排名</div>
                                    </div>
                                </th>
                                <th width="65" class="text-center font-weight-bold" style="white-space: nowrap;">
                                    <div class="header-cell">ID</div>
                                </th>
                                <th width="85" class="font-weight-bold" style="white-space: nowrap;">
                                    <div class="header-cell">👤 姓名</div>
                                </th>
                                <th width="45" class="text-center font-weight-bold" style="white-space: nowrap;">
                                    <div class="header-cell">年龄</div>
                                </th>
                                <th width="95" class="font-weight-bold" style="white-space: nowrap;">
                                    <div class="header-cell">🎖️ 称号</div>
                                </th>
                                <th width="75" class="font-weight-bold" style="white-space: nowrap;">
                                    <div class="header-cell">👨‍🏫 师父</div>
                                </th>
                                <th width="60" class="text-center font-weight-bold text-danger" style="white-space: nowrap;">
                                    <div class="header-cell">
                                        <div class="header-icon">💔</div>
                                        <div class="header-text">气血</div>
                                    </div>
                                </th>
                                <th width="60" class="text-center font-weight-bold text-info" style="white-space: nowrap;">
                                    <div class="header-cell">
                                        <div class="header-icon">💙</div>
                                        <div class="header-text">精气</div>
                                    </div>
                                </th>
                                <th width="60" class="text-center font-weight-bold text-warning" style="white-space: nowrap;">
                                    <div class="header-cell">
                                        <div class="header-icon">⚡</div>
                                        <div class="header-text">内力</div>
                                    </div>
                                </th>
                                <th width="60" class="text-center font-weight-bold text-success" style="white-space: nowrap;">
                                    <div class="header-cell">
                                        <div class="header-icon">🌟</div>
                                        <div class="header-text">精力</div>
                                    </div>
                                </th>
                                <th width="75" class="text-center font-weight-bold text-mud-gold" style="white-space: nowrap;">
                                    <div class="header-cell">
                                        <div class="header-icon">⭐</div>
                                        <div class="header-text">经验</div>
                                    </div>
                                </th>
                                <th width="45" class="text-center font-weight-bold text-success" style="white-space: nowrap;">
                                    <div class="header-cell">
                                        <div class="header-icon">⚔️</div>
                                        <div class="header-text">杀敌</div>
                                    </div>
                                </th>
                                <th width="45" class="text-center font-weight-bold text-danger" style="white-space: nowrap;">
                                    <div class="header-cell">
                                        <div class="header-icon">💀</div>
                                        <div class="header-text">死亡</div>
                                    </div>
                                </th>
                                <th width="80" class="text-center font-weight-bold" style="white-space: nowrap;">
                                    <div class="header-cell">
                                        <div class="header-icon">🕐</div>
                                        <div class="header-text">最近登录</div>
                                    </div>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $index => $user)
                            <tr class="transition-hover">
                                <td class="text-center font-weight-bold text-mud-rank">
                                    {{ $this->getAccurateRank($index + 1, $users) }}
                                </td>
                                <td class="text-center">
                                    <span class="mud-badge mud-badge-id">{{ $user->id }}</span>
                                </td>
                                <td class="text-mud-name">{{ $user->name }}</td>
                                <td class="text-center">
                                    <small class="mud-badge">{{ $user->age }}</small>
                                </td>
                                <td class="text-mud-title">{{ $user->title ?: '-' }}</td>
                                <td class="text-mud-master py-1">
                                    <small>{{ $user->master ?: '-' }}</small>
                                </td>
                                <td class="text-center font-weight-bold text-mud-health">{{ number_format($user->qi) }}</td>
                                <td class="text-center font-weight-bold text-mud-mana">{{ number_format($user->jing) }}</td>
                                <td class="text-center font-weight-bold text-mud-energy">{{ number_format($user->neili) }}</td>
                                <td class="text-center font-weight-bold text-mud-spirit">{{ number_format($user->jingli) }}</td>
                                <td class="text-center text-mud-gold">
                                    <small><strong>{{ number_format($user->combat_exp) }}</strong></small>
                                </td>
                                <td class="text-center">
                                    <span class="mud-badge mud-badge-success">{{ $user->kill }}</span>
                                </td>
                                <td class="text-center">
                                    <span class="mud-badge mud-badge-danger">{{ $user->die }}</span>
                                </td>
                                <td class="text-center">
                                    <small class="text-mud-time">{{ $user->updated_at->diffForHumans() }}</small>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- 中等屏幕表格视图 - 紧凑型表头 -->
    <div class="d-none d-lg-block d-xl-none">
        <div class="card border-0 mud-card shadow-lg">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0 mud-table table-sm">
                        <thead class="mud-thead">
                            <tr>
                                <th width="40" class="text-center font-weight-bold text-mud-rank" style="white-space: nowrap; font-size: 0.8rem; padding: 0.5rem 0.25rem;">
                                    <div>🏆</div>
                                    <div class="small">排名</div>
                                </th>
                                <th width="60" class="text-center font-weight-bold text-mud-id" style="white-space: nowrap; font-size: 0.8rem; padding: 0.5rem 0.25rem;">ID</th>
                                <th width="80" class="font-weight-bold text-mud-name" style="white-space: nowrap; font-size: 0.8rem; padding: 0.5rem 0.25rem;">👤 姓名</th>
                                <th width="40" class="text-center font-weight-bold" style="white-space: nowrap; font-size: 0.8rem; padding: 0.5rem 0.25rem;">年龄</th>
                                <th width="90" class="font-weight-bold text-mud-title" style="white-space: nowrap; font-size: 0.8rem; padding: 0.5rem 0.25rem;">🎖️ 称号</th>
                                <th width="70" class="font-weight-bold" style="white-space: nowrap; font-size: 0.8rem; padding: 0.5rem 0.25rem;">👨‍🏫 师父</th>
                                <th width="55" class="text-center font-weight-bold text-mud-health" style="white-space: nowrap; font-size: 0.8rem; padding: 0.5rem 0.25rem;">
                                    <div>💔</div>
                                    <div class="small">气血</div>
                                </th>
                                <th width="55" class="text-center font-weight-bold text-mud-mana" style="white-space: nowrap; font-size: 0.8rem; padding: 0.5rem 0.25rem;">
                                    <div>💙</div>
                                    <div class="small">精气</div>
                                </th>
                                <th width="55" class="text-center font-weight-bold text-mud-energy" style="white-space: nowrap; font-size: 0.8rem; padding: 0.5rem 0.25rem;">
                                    <div>⚡</div>
                                    <div class="small">内力</div>
                                </th>
                                <th width="55" class="text-center font-weight-bold text-mud-spirit" style="white-space: nowrap; font-size: 0.8rem; padding: 0.5rem 0.25rem;">
                                    <div>🌟</div>
                                    <div class="small">精力</div>
                                </th>
                                <th width="70" class="text-center font-weight-bold text-mud-gold" style="white-space: nowrap; font-size: 0.8rem; padding: 0.5rem 0.25rem;">
                                    <div>⭐</div>
                                    <div class="small">经验</div>
                                </th>
                                <th width="40" class="text-center font-weight-bold text-mud-success" style="white-space: nowrap; font-size: 0.8rem; padding: 0.5rem 0.25rem;">
                                    <div>⚔️</div>
                                    <div class="small">杀敌</div>
                                </th>
                                <th width="40" class="text-center font-weight-bold text-mud-danger" style="white-space: nowrap; font-size: 0.8rem; padding: 0.5rem 0.25rem;">
                                    <div>💀</div>
                                    <div class="small">死亡</div>
                                </th>
                                <th width="75" class="text-center font-weight-bold text-mud-time" style="white-space: nowrap; font-size: 0.8rem; padding: 0.5rem 0.25rem;">
                                    <div>🕐</div>
                                    <div class="small">最近登录</div>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $index => $user)
                            <tr class="transition-hover">
                                <td class="text-center font-weight-bold text-mud-rank py-1">
                                    <small>{{ $this->getAccurateRank($index + 1, $users) }}</small>
                                </td>
                                <td class="text-center py-1">
                                    <span class="mud-badge mud-badge-id">{{ $user->id }}</span>
                                </td>
                                <td class="text-mud-name py-1">
                                    <small>{{ $user->name }}</small>
                                </td>
                                <td class="text-center py-1">
                                    <small class="mud-badge">{{ $user->age }}</small>
                                </td>
                                <td class="text-mud-title py-1">
                                    <small>{{ $user->title ?: '-' }}</small>
                                </td>
                                <td class="text-mud-master py-1">
                                    <small>{{ $user->master ?: '-' }}</small>
                                </td>
                                <td class="text-center font-weight-bold text-mud-health py-1">
                                    <small>{{ number_format($user->qi) }}</small>
                                </td>
                                <td class="text-center font-weight-bold text-mud-mana py-1">
                                    <small>{{ number_format($user->jing) }}</small>
                                </td>
                                <td class="text-center font-weight-bold text-mud-energy py-1">
                                    <small>{{ number_format($user->neili) }}</small>
                                </td>
                                <td class="text-center font-weight-bold text-mud-spirit py-1">
                                    <small>{{ number_format($user->jingli) }}</small>
                                </td>
                                <td class="text-center text-mud-gold py-1">
                                    <small><strong>{{ number_format($user->combat_exp) }}</strong></small>
                                </td>
                                <td class="text-center py-1">
                                    <span class="mud-badge mud-badge-success">{{ $user->kill }}</span>
                                </td>
                                <td class="text-center py-1">
                                    <span class="mud-badge mud-badge-danger">{{ $user->die }}</span>
                                </td>
                                <td class="text-center py-1">
                                    <small class="text-mud-time">{{ $user->updated_at->diffForHumans() }}</small>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- 小屏幕桌面端表格视图 - 超紧凑型 -->
    <div class="d-none d-md-block d-lg-none">
        <div class="card border-0 mud-card shadow">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0 mud-table table-sm">
                        <thead class="mud-thead">
                            <tr>
                                <th width="35" class="text-center font-weight-bold" style="white-space: nowrap; font-size: 0.75rem; padding: 0.4rem 0.2rem;">🏆</th>
                                <th width="55" class="text-center font-weight-bold" style="white-space: nowrap; font-size: 0.75rem; padding: 0.4rem 0.2rem;">ID</th>
                                <th width="75" class="font-weight-bold" style="white-space: nowrap; font-size: 0.75rem; padding: 0.4rem 0.2rem;">姓名</th>
                                <th width="40" class="text-center font-weight-bold" style="white-space: nowrap; font-size: 0.75rem; padding: 0.4rem 0.2rem;">年龄</th>
                                <th width="80" class="font-weight-bold" style="white-space: nowrap; font-size: 0.75rem; padding: 0.4rem 0.2rem;">称号</th>
                                <th width="60" class="text-center font-weight-bold" style="white-space: nowrap; font-size: 0.75rem; padding: 0.4rem 0.2rem;">
                                    <div class="text-danger">💔</div>
                                    <div class="small">气血</div>
                                </th>
                                <th width="60" class="text-center font-weight-bold" style="white-space: nowrap; font-size: 0.75rem; padding: 0.4rem 0.2rem;">
                                    <div class="text-info">💙</div>
                                    <div class="small">精气</div>
                                </th>
                                <th width="60" class="text-center font-weight-bold" style="white-space: nowrap; font-size: 0.75rem; padding: 0.4rem 0.2rem;">
                                    <div class="text-warning">⚡</div>
                                    <div class="small">内力</div>
                                </th>
                                <th width="60" class="text-center font-weight-bold" style="white-space: nowrap; font-size: 0.75rem; padding: 0.4rem 0.2rem;">
                                    <div class="text-success">🌟</div>
                                    <div class="small">精力</div>
                                </th>
                                <th width="65" class="text-center font-weight-bold text-primary" style="white-space: nowrap; font-size: 0.75rem; padding: 0.4rem 0.2rem;">
                                    <div>⭐</div>
                                    <div class="small">经验</div>
                                </th>
                                <th width="35" class="text-center font-weight-bold text-success" style="white-space: nowrap; font-size: 0.75rem; padding: 0.4rem 0.2rem;">
                                    <div>⚔️</div>
                                    <div class="small">杀敌</div>
                                </th>
                                <th width="35" class="text-center font-weight-bold text-danger" style="white-space: nowrap; font-size: 0.75rem; padding: 0.4rem 0.2rem;">
                                    <div>💀</div>
                                    <div class="small">死亡</div>
                                </th>
                                <th width="70" class="text-center font-weight-bold" style="white-space: nowrap; font-size: 0.75rem; padding: 0.4rem 0.2rem;">
                                    <div>🕐</div>
                                    <div class="small">最近登录</div>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $index => $user)
                            <tr class="transition-hover">
                                <td class="text-center font-weight-bold text-mud-rank py-1">
                                    <small><strong>{{ $this->getAccurateRank($index + 1, $users) }}</strong></small>
                                </td>
                                <td class="text-center py-1">
                                    <span class="mud-badge mud-badge-id">{{ $user->id }}</span>
                                </td>
                                <td class="text-mud-name py-1">
                                    <small>{{ $user->name }}</small>
                                </td>
                                <td class="text-center py-1">
                                    <small class="mud-badge">{{ $user->age }}</small>
                                </td>
                                <td class="text-mud-title py-1">
                                    <small>{{ $user->title ?: '-' }}</small>
                                </td>
                                <td class="text-center py-1">
                                    <small class="text-mud-health">{{ number_format($user->qi) }}</small>
                                </td>
                                <td class="text-center py-1">
                                    <small class="text-mud-mana">{{ number_format($user->jing) }}</small>
                                </td>
                                <td class="text-center py-1">
                                    <small class="text-mud-energy">{{ number_format($user->neili) }}</small>
                                </td>
                                <td class="text-center py-1">
                                    <small class="text-mud-spirit">{{ number_format($user->jingli) }}</small>
                                </td>
                                <td class="text-center py-1">
                                    <small class="text-mud-gold">{{ number_format($user->combat_exp) }}</small>
                                </td>
                                <td class="text-center py-1">
                                    <span class="mud-badge mud-badge-success">{{ $user->kill }}</span>
                                </td>
                                <td class="text-center py-1">
                                    <span class="mud-badge mud-badge-danger">{{ $user->die }}</span>
                                </td>
                                <td class="text-center py-1">
                                    <small class="text-mud-time">{{ $user->updated_at->diffForHumans() }}</small>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- 移动端卡片视图 -->
    <div class="d-lg-none">
        <div class="row">
            @foreach ($users as $index => $user)
            <div class="col-12 col-md-6 mb-3">
                <div class="card h-100 mud-mobile-card shadow-sm">
                    <div class="card-header mud-mobile-card-header py-2">
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="font-weight-bold text-mud-rank">🏆 #{{ $this->getAccurateRank($index + 1, $users) }}</span>
                            <span class="mud-badge mud-badge-id">{{ $user->id }}</span>
                        </div>
                    </div>
                    <div class="card-body py-2">
                        <h5 class="card-title mb-2 font-weight-bold text-mud-name">{{ $user->name }}</h5>
                        <p class="card-text mb-1">
                            <small class="text-mud-title">称号: {{ $user->title ?: '无' }}</small>
                        </p>
                        <div class="row text-center mb-2">
                            <div class="col-4">
                                <small class="text-mud-label d-block">年龄</small>
                                <span class="font-weight-bold text-mud-value">{{ $user->age }}</span>
                            </div>
                            <div class="col-4">
                                <small class="text-mud-label d-block">师父</small>
                                <span class="font-weight-bold text-mud-value">{{ $user->master ?: '-' }}</span>
                            </div>
                            <div class="col-4">
                                <small class="text-mud-label d-block">经验</small>
                                <span class="font-weight-bold text-mud-gold">{{ number_format($user->combat_exp) }}</span>
                            </div>
                        </div>
                        <div class="row text-center">
                            <div class="col-3">
                                <small class="text-mud-health d-block">气血</small>
                                <span class="font-weight-bold text-mud-health">{{ number_format($user->qi) }}</span>
                            </div>
                            <div class="col-3">
                                <small class="text-mud-mana d-block">精气</small>
                                <span class="font-weight-bold text-mud-mana">{{ number_format($user->jing) }}</span>
                            </div>
                            <div class="col-3">
                                <small class="text-mud-energy d-block">内力</small>
                                <span class="font-weight-bold text-mud-energy">{{ number_format($user->neili) }}</span>
                            </div>
                            <div class="col-3">
                                <small class="text-mud-spirit d-block">精力</small>
                                <span class="font-weight-bold text-mud-spirit">{{ number_format($user->jingli) }}</span>
                            </div>
                        </div>
                        <div class="row text-center mt-2">
                            <div class="col-6">
                                <small class="text-mud-label d-block">杀敌</small>
                                <span class="mud-badge mud-badge-success">{{ $user->kill }}</span>
                            </div>
                            <div class="col-6">
                                <small class="text-mud-label d-block">死亡</small>
                                <span class="mud-badge mud-badge-danger">{{ $user->die }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer mud-mobile-card-footer py-1">
                        <small class="text-mud-time float-right">{{ $user->updated_at->diffForHumans() }}</small>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <!-- 分页组件 -->
    <div class="d-flex justify-content-center mt-4">
        {{ $users->links('pagination::bootstrap-4') }}
    </div>
</div>

@push('styles')
<style>
/* ===== MUD游戏暗黑色调主题 ===== */

/* 全局暗色背景 */
body {
    background-color: #1a1a1a;
    color: #e0e0e0;
}

/* 英雄区域 - 深灰色渐变 */
.hero-section {
    background: linear-gradient(135deg, #2a2a2a 0%, #1a1a1a 100%);
    border: 1px solid #444;
    box-shadow: 0 4px 15px rgba(0,0,0,0.5), inset 0 1px 0 rgba(255,255,255,0.1);
}

.hero-section h1 {
    color: #ffd700;
    text-shadow: 2px 2px 4px rgba(0,0,0,0.8);
}

.hero-section p {
    color: #ccc;
}

/* 搜索框 - 终端风格 */
.search-container .input-group-text {
    background: #333;
    border: 1px solid #555;
    color: #ffd700;
    border-radius: 25px 0 0 25px;
}

.search-container .form-control {
    background: #2a2a2a;
    border: 1px solid #555;
    color: #e0e0e0;
    border-left: none;
}

.search-container .form-control:focus {
    background: #333;
    border-color: #ffd700;
    box-shadow: 0 0 0 0.2rem rgba(255, 215, 0, 0.25);
    color: #fff;
}

.search-container .form-control::placeholder {
    color: #888;
}

/* MUD风格卡片 */
.mud-card {
    background: #2a2a2a;
    border: 1px solid #444;
    box-shadow: 0 4px 15px rgba(0,0,0,0.5);
}

/* MUD风格表格 */
.mud-table {
    background: #2a2a2a;
    color: #e0e0e0;
}

/* MUD表头 - 深灰色带金色边框 */
.mud-thead {
    background: linear-gradient(135deg, #333 0%, #2a2a2a 100%);
    border-bottom: 2px solid #ffd700;
    color: #ffd700;
}

.mud-thead th {
    border: none;
    border-right: 1px solid #444;
    font-weight: 600;
}

.mud-thead th:last-child {
    border-right: none;
}

/* 表格行悬停效果 */
.mud-table tbody tr {
    border-bottom: 1px solid #333;
    transition: all 0.2s ease;
}

.mud-table tbody tr:hover {
    background: #333;
    box-shadow: inset 0 0 10px rgba(255, 215, 0, 0.1);
}

.mud-table tbody tr:last-child {
    border-bottom: none;
}

/* MUD风格单元格 */
.mud-table td {
    border: none;
    border-right: 1px solid #333;
    vertical-align: middle;
}

.mud-table td:last-child {
    border-right: none;
}

/* 排名样式 - 金色 */
.text-mud-rank {
    color: #ffd700 !important;
    text-shadow: 1px 1px 2px rgba(0,0,0,0.8);
}

/* ID样式 - 银灰色 */
.text-mud-id {
    color: #b0b0b0 !important;
}

/* 重要数值颜色 */
.text-mud-gold {
    color: #ffd700 !important;
    font-weight: bold;
}

.text-mud-danger {
    color: #ff6b6b !important;
    font-weight: bold;
}

.text-mud-health {
    color: #4ecdc4 !important;
    font-weight: bold;
}

.text-mud-mana {
    color: #45b7d1 !important;
    font-weight: bold;
}

.text-mud-energy {
    color: #f9ca24 !important;
    font-weight: bold;
}

.text-mud-spirit {
    color: #6c5ce7 !important;
    font-weight: bold;
}

.text-mud-success {
    color: #51cf66 !important;
    font-weight: bold;
}

.text-mud-rank {
    color: #ffd700 !important;
    font-weight: bold;
}

.text-mud-id {
    color: #b0b0b0 !important;
}

/* 优化姓名字段显示 - 防止换行 */
.text-mud-name {
    color: #e0e0e0 !important;
    font-weight: bold;
    font-size: 0.85rem;
    line-height: 1.2;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
    max-width: 100%;
    display: block;
    padding: 0.1rem 0;
}

/* 表格单元格优化 - 确保内容不溢出 */
.mud-table td {
    vertical-align: middle;
    padding: 0.5rem 0.3rem;
    position: relative;
    overflow: hidden;
}

/* 针对不同屏幕尺寸的列宽优化 */
@media (min-width: 1200px) {
    .mud-table th:nth-child(3), /* 姓名列 */
    .mud-table td:nth-child(3) {
        max-width: 90px;
        min-width: 80px;
    }

    .mud-table th:nth-child(6), /* 师父列 */
    .mud-table td:nth-child(6) {
        max-width: 75px;
        min-width: 65px;
    }

    .mud-table th:nth-child(11), /* 经验列 */
    .mud-table td:nth-child(11) {
        max-width: 80px;
        min-width: 70px;
    }
}

@media (min-width: 992px) and (max-width: 1199px) {
    .mud-table th:nth-child(3), /* 姓名列 */
    .mud-table td:nth-child(3) {
        max-width: 80px;
        min-width: 70px;
    }

    .mud-table th:nth-child(6), /* 师父列 */
    .mud-table td:nth-child(6) {
        max-width: 70px;
        min-width: 60px;
    }

    .mud-table th:nth-child(11), /* 经验列 */
    .mud-table td:nth-child(11) {
        max-width: 75px;
        min-width: 65px;
    }
}

@media (max-width: 991px) {
    .mud-table th:nth-child(3), /* 姓名列 */
    .mud-table td:nth-child(3) {
        max-width: 75px;
        min-width: 65px;
    }

    .mud-table th:nth-child(6), /* 师父列 */
    .mud-table td:nth-child(6) {
        max-width: 60px;
        min-width: 50px;
    }

    .mud-table th:nth-child(11), /* 经验列 */
    .mud-table td:nth-child(11) {
        max-width: 70px;
        min-width: 60px;
    }
}

/* 师父字段优化 - 字号稍大以突出显示 */
.text-mud-master {
    color: #d4a574 !important;
    font-size: 0.9rem;
    line-height: 1.2;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
    max-width: 100%;
    font-weight: 600;
}

/* 称号字段优化 */
.text-mud-title {
    color: #ccc !important;
    font-style: italic;
    font-size: 0.8rem;
    line-height: 1.2;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
    max-width: 100%;
}

.text-mud-time {
    color: #888 !important;
    font-size: 0.8rem;
}

.text-mud-label {
    color: #aaa !important;
    font-size: 0.75rem;
}

.text-mud-value {
    color: #e0e0e0 !important;
    font-weight: bold;
}

/* 表头文字样式 */
.header-cell {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    text-align: center;
    line-height: 1.2;
}

.header-icon {
    font-size: 0.9rem;
    margin-bottom: 0.15rem;
    filter: drop-shadow(1px 1px 1px rgba(0,0,0,0.5));
}

.header-text {
    font-size: 0.75rem;
    font-weight: 500;
    opacity: 0.9;
    color: #ccc;
}

/* MUD风格徽章 */
.mud-badge {
    background: #444;
    color: #ffd700;
    border: 1px solid #666;
    font-size: 0.75rem;
    padding: 0.2rem 0.4rem;
    border-radius: 0.25rem;
    font-weight: 500;
}

.mud-badge-id {
    background: #3a3a3a;
    color: #b0b0b0;
    border: 1px solid #666;
}

.mud-badge-success {
    background: #2a4a2a;
    color: #51cf66;
    border: 1px solid #51cf66;
}

.mud-badge-danger {
    background: #4a2a2a;
    color: #ff6b6b;
    border: 1px solid #ff6b6b;
}

/* 移动端卡片样式 */
.mud-mobile-card {
    background: #2a2a2a;
    border: 1px solid #444;
    box-shadow: 0 2px 8px rgba(0,0,0,0.4);
}

.mud-mobile-card-header {
    background: linear-gradient(135deg, #333 0%, #2a2a2a 100%);
    border-bottom: 1px solid #ffd700;
    color: #ffd700;
}

.mud-mobile-card-footer {
    background: #252525;
    border-top: 1px solid #333;
}

/* 移动端卡片内容优化 */
.mud-mobile-card .card-body {
    padding: 0.75rem;
}

.mud-mobile-card .card-title {
    font-size: 1rem;
    margin-bottom: 0.5rem;
}

.mud-mobile-card .card-text {
    margin-bottom: 0.5rem;
}

.mud-mobile-card small {
    font-size: 0.8rem;
    line-height: 1.3;
}

/* 移动端数值显示优化 */
.mud-mobile-card .text-mud-health,
.mud-mobile-card .text-mud-mana,
.mud-mobile-card .text-mud-energy,
.mud-mobile-card .text-mud-spirit,
.mud-mobile-card .text-mud-gold {
    font-size: 0.85rem;
    font-weight: 600;
}

.mud-mobile-card .text-mud-label {
    font-size: 0.7rem;
    margin-bottom: 0.2rem;
}

.mud-mobile-card .text-mud-value {
    font-size: 0.9rem;
}

/* 移动端姓名优化 */
.mud-mobile-card .text-mud-name {
    font-size: 1rem;
    line-height: 1.2;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
}

/* 移动端师父字段优化 */
.mud-mobile-card .text-mud-master {
    font-size: 0.95rem;
    font-weight: 600;
    color: #d4a574 !important;
}

/* 不同屏幕尺寸下师父字段的精细调整 */
@media (min-width: 1200px) {
    .text-mud-master {
        font-size: 0.95rem;
        padding: 0.4rem 0.2rem;
    }
}

@media (min-width: 992px) and (max-width: 1199px) {
    .text-mud-master {
        font-size: 0.9rem;
        padding: 0.3rem 0.2rem;
    }
}

@media (max-width: 991px) {
    .text-mud-master {
        font-size: 0.85rem;
        padding: 0.2rem 0.1rem;
    }
}

/* 移动端卡片中的师父字段 */
@media (max-width: 767px) {
    .mud-mobile-card .text-mud-master {
        font-size: 0.9rem;
        font-weight: 600;
        line-height: 1.3;
    }
}

/* 卡片悬停效果 */
.mud-card:hover {
    transform: translateY(-1px);
    box-shadow: 0 6px 20px rgba(0,0,0,0.6), inset 0 1px 0 rgba(255,255,255,0.1);
    border-color: #555;
}

/* 移动端卡片样式 */
.mud-mobile-card {
    background: #2a2a2a;
    border: 1px solid #444;
    box-shadow: 0 2px 8px rgba(0,0,0,0.4);
}

.mud-mobile-card .card-header {
    background: linear-gradient(135deg, #333 0%, #2a2a2a 100%);
    border-bottom: 1px solid #ffd700;
    color: #ffd700;
}

/* 响应式调整 */
@media (max-width: 1200px) {
    .mud-table th {
        font-size: 0.8rem !important;
        padding: 0.5rem 0.3rem !important;
    }

    .header-icon {
        font-size: 0.8rem;
    }

    .header-text {
        font-size: 0.65rem;
    }
}

@media (max-width: 768px) {
    .hero-section h1 {
        font-size: 1.8rem;
    }

    .hero-section p {
        font-size: 0.9rem;
    }

    .mud-card {
        margin: 0 10px;
    }
}

/* 分页样式 */
.pagination {
    background: #2a2a2a;
    border: 1px solid #444;
}

.page-link {
    background: #333;
    border: 1px solid #555;
    color: #ccc;
}

.page-link:hover {
    background: #444;
    border-color: #ffd700;
    color: #ffd700;
}

.page-item.active .page-link {
    background: #ffd700;
    border-color: #ffd700;
    color: #1a1a1a;
}

/* 滚动条美化 */
.table-responsive::-webkit-scrollbar {
    height: 8px;
}

.table-responsive::-webkit-scrollbar-track {
    background: #1a1a1a;
}

.table-responsive::-webkit-scrollbar-thumb {
    background: #444;
    border-radius: 4px;
}

.table-responsive::-webkit-scrollbar-thumb:hover {
    background: #555;
}
</style>
@endpush
